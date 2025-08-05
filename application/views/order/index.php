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
				<a href="<?php echo base_url('/index.php/order/add') ?>">
					<button type="button" class="btn btn-primary">
						Tambah
					</button>
				</a>
				<p></p>
				<table class="table table-condensed table-striped">
					<thead>
					<tr>
						<th>Id</th>
						<th>No Order</th>
						<th>Nama Customer</th>
						<th>Tanggal Transaksi</th>
						<th>Tanggal Selesai Cuci</th>
						<th>Status</th>
						<th>Total Harga</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($orders as $order): ?>
					<tr data-toggle="collapse" data-target="#data<?php echo $order['id']; ?>" class="accordion-toggle">
						<td><?php echo $order['id']; ?></td>
						<td><?php echo $order['no_order']; ?></td>
						<td><?php echo $order['nama']; ?></td>
						<td><?php echo $order['tanggal_transaksi']; ?></td>
						<td><?php echo $order['tanggal_selesai_cuci']; ?></td>
						<td><?php echo $order['sudah_selesai'] == 0 ? 'Belum Selesai' : 'Selesai'; ?></td>
						<td><?php echo $order['total_uang']; ?></td>
						<td>
							<a href="<?= base_url('/index.php/order/delete/'.$order['id']) ?>">
								<button type="button" class="btn btn-danger">Hapus</button>
							</a>
						</td>
					</tr>

					<tr>
						<td colspan="12" class="hiddenRow">
							<div class="accordian-body collapse" id="data<?php echo $order['id']; ?>">
								<table class="table table-striped">
									<thead>
									<tr class="info">
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Satuan Berat</th>
										<th>Paket</th>
									</tr>
									</thead>

									<tbody>
									<?php foreach ($order["items"] as $item): ?>
									<tr data-toggle="collapse" class="accordion-toggle" data-target="#data<?php echo $order['id']; ?>">
										<td><?php echo $item['uang']; ?></td>
										<td><?php echo $item['jumlah']; ?></td>
										<td><?php echo $item['satuan_berat']; ?></td>
										<td><?php echo $item['nama']; ?></td>
									</tr>
									</tbody>
									<?php endforeach; ?>
								</table>

							</div>
						</td>
					</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
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

</body>

</html>
