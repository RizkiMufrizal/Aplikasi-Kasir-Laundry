<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/header.php'); ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<?php $this->load->view('templates/navbar-left.php'); ?>

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<?php $this->load->view('templates/navbar-top.php'); ?>

			<!-- Begin Page Content -->
			<div class="container-fluid">
				<div class="col-md-3">

					<form id="orderForm" action="<?php echo base_url('/index.php/order/save') ?>" method="post">
						<div class="mb-3">
							<select name="customer" class="form-select" aria-label="Default select example">
								<?php foreach ($customers as $option): ?>
									<option value="<?php echo $option['id']; ?>"><?php echo $option['nama']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Selesai Cucian</label>
							<input type="date" class="form-control" name="tanggal_selesai_cuci">
						</div>

						<p></p>

						<table class="table" id="tableItems">
							<thead>
							<tr>
								<th>Paket</th>
								<th>Kuantiti</th>
								<th>Satuan Berat</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<select name="paket[]" class="form-select" aria-label="Default select example">
										<?php foreach ($pakets as $option): ?>
											<option value="<?php echo $option['id'].'|'.$option['harga'];; ?>"><?php echo $option['nama'].' Rp. '.$option['harga'] ?></option>
										<?php endforeach; ?>
									</select>
								</td>
								<td><input name="jumlah[]" class="form-control" type="number" required></td>
								<td>Kg</td>
								<td>
									<button type="button" class="remove-row btn btn-danger">−</button>
								</td>
							</tr>
							</tbody>
						</table>
						<button type="button" id="addRow" class="btn btn-secondary">+ Add Row</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>

				</div>
			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

		<!-- Footer -->
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; Aplikasi Kasir Laundry 2025</span>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
<script>
	$(function () {
		$('#addRow').click(function () {
			const row = $('#tableItems tbody tr:first').clone();
			row.find('input').val('');
			$('#tableItems tbody').append(row);
		});
		$('#tableItems').on('click', '.remove-row', function () {
			if ($('#tableItems tbody tr').length > 1)
				$(this).closest('tr').remove();
		});
	});
</script>

</body>

</html>
