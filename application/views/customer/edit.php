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
                        <form action="<?= base_url('/index.php/customer/update/'.$customer->id) ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" name="nama" value="<?= $customer->nama ?>" placeholder="Nama Customer">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $customer->alamat ?>" placeholder="Alamat">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Hp</label>
                                <input type="text" class="form-control" name="no_hp" value="<?= $customer->no_hp ?>" placeholder="No Hp">
                            </div>
                            <button class="btn btn-success" type="submit">Update</button>
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

</body>

</html>