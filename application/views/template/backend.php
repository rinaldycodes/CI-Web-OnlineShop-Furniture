<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title.' - '.NAMA_WEB ?></title>
        <link href="<?= base_url('assets/library/sb/') ?>css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css') ?>/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <script src="<?php echo base_url('assets/js') ?>/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/css') ?>/style.css" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>
    <body class="sb-nav-fixed ">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>"><?php echo NAMA_WEB ?></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            
            <ul class="navbar-nav ml-auto ml-md-0">
                <!-- NAV BAR ADMIN -->
                <?php if ($this->session->userdata('role')=='admin'): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
                        <?php echo $isLogin['nama_admin']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('logout') ?>">Logout</a>
                    </div>
                </li>


                <!-- NAVBAR USER -->
                <?php elseif ($this->session->userdata('role')=='user'): ?>
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
                        <?php echo $isLogin['nama']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                       
                        <a class="dropdown-item" href="<?php echo base_url('logout') ?>">Logout</a>
                    </div>
                </li>
                <?php else: ?>
                <?php endif; ?>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <?php if($this->session->userdata('role') == 'user'): ?>
                <?php $this->load->view('template/partials_backend/sidenav_user') ?>
            <?php elseif($this->session->userdata('role') == 'admin'): ?>
                <?php $this->load->view('template/partials_backend/sidenav_admin') ?>
            <?php else: ?>
            <?php endif; ?>

            <div id="layoutSidenav_content">
                <main class="">
                    <div class="container-fluid">
                        <?php echo $this->session->flashdata('pesan'); ?>

                        <!--  KONTEN  -->
                        <?php $this->load->view($page) ?>                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; FurnitureShopPRO 2020 </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js') ?>/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js') ?>/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="<?= base_url('assets/library/sb/') ?>js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>

        <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>

        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <script>
                CKEDITOR.replace( 'editor1' );
        </script>
    </body>
</html>
