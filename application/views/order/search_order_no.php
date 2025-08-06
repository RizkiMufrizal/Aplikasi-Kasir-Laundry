<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Cari Order</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?>"></script>
</head>
<body class="d-flex align-items-center bg-light" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <form class="d-flex" action="<?php echo base_url('/index.php/order/resultSearchOrderNo') ?>" method="post">
            <input class="form-control me-2" type="search" name="order_no" placeholder="Cari Data Order" aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
	  <p></p>
	  <div class="row justify-content-center">
		  <div class="col-md-8 col-lg-6">
			  <?php if(isset($data)) { ?>
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
				  </tr>
				  </thead>
				  <tbody>
				  <tr data-toggle="collapse" data-target="#data" class="accordion-toggle">
					  <td><?php echo $data->id; ?></td>
					  <td><?php echo $data->no_order; ?></td>
					  <td><?php echo $data->nama; ?></td>
					  <td><?php echo $data->tanggal_transaksi; ?></td>
					  <td><?php echo $data->tanggal_selesai_cuci; ?></td>
					  <td><?php echo $data->sudah_selesai == 0 ? 'Belum Selesai' : 'Selesai'; ?></td>
					  <td><?php echo $data->total_uang; ?></td>
				  </tr>

				  <tr>
					  <td colspan="12" class="hiddenRow">
						  <div class="accordian-body collapse" id="data">
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
								  <?php foreach ($data->items as $item): ?>
								  <tr data-toggle="collapse" class="accordion-toggle" data-target="#data">
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
				  </tbody>
			  </table>
			  <?php } else { ?>
				  <h3 class="text-center">Data Tidak Tersedia</h3>
			  <?php } ?>
		  </div>
	  </div>
  </div>

    <script src="<?= base_url('/assets/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('/assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script>
    (function(){
      'use strict';
      document.querySelector('form.needs-validation').addEventListener('submit', function(e){
        if (!this.checkValidity()){e.preventDefault(); e.stopPropagation();}
        this.classList.add('was-validated');
      }, false);
    })();
  </script>
</body>
</html>
