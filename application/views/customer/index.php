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
                    <a href="<?= base_url('/index.php/customer/add') ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah
                        </button>
                    </a>
                    <p></p>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Customer</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?php echo $customer->id ?></td>
                            <td><?php echo $customer->alamat ?></td>
                            <td><?php echo $customer->no_hp ?></td>
                            <td>
                                <a href="<?= base_url('/index.php/customer/edit/'.$customer->id) ?>">
                                    <button type="button" class="btn btn-success">Edit</button>
                                </a>
                                <a href="<?= base_url('/index.php/customer/delete/'.$customer->id) ?>">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
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