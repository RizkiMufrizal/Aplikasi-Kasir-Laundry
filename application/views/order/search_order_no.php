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
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari Data Order" aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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
