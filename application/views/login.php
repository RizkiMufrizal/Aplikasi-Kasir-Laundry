<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?>"></script>
</head>
<body class="d-flex align-items-center bg-light" style="min-height:100vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
        <?php endif; ?>
        <form method="post" action="<?= base_url('index.php/auth/login') ?>" class="bg-white p-4 rounded shadow-sm needs-validation" novalidate>
          <div class="mb-3">
            <label for="username" class="form-label">Username / Email</label>
            <input type="text" name="username" id="username"
              class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
              value="<?= set_value('username') ?>"
              required>
            <div class="invalid-feedback">
              <?= form_error('username') ?: 'Required' ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
              class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
              required>
            <div class="invalid-feedback">
              <?= form_error('password') ?: 'Required' ?>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="text-center text-muted mt-3 small">
          &copy; <?= date('Y') ?>
        </p>
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
