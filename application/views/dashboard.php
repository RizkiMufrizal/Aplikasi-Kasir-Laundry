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

                    <div class="container-fluid py-5"> 
                        <h1 class="display-5 fw-bold text-center">Selamat Datang</h1> 
                        <p class="display-5 text-center">Aplikasi Kasir Laundry</p> 
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