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
                    <a href="<?= base_url('/index.php/paket/add') ?>">
                        <button type="button" class="btn btn-primary">
                            Tambah
                        </button>
                    </a>
                    <p></p>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pakets as $paket): ?>
                        <tr>
                            <td><?php echo $paket->id ?></td>
                            <td><?php echo $paket->nama ?></td>
                            <td><?php echo $paket->harga ?></td>
                            <td>
                                <a href="<?= base_url('/index.php/paket/edit/'.$paket->id) ?>">
                                    <button type="button" class="btn btn-success">Edit</button>
                                </a>
                                <a href="<?= base_url('/index.php/paket/delete/'.$paket->id) ?>">
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