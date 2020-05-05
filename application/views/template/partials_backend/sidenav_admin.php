<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="<?php echo base_url('manage') ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Manage</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-admin') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Admin</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-user') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data User</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-produk') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Produk</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-pesanan') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Pesanan</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-kategori') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Kategori</a>
                            <a class="nav-link" href="<?php echo base_url('manage/data-kota') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Kota</a>

                            <a class="nav-link" href="<?php echo base_url('manage/data-bank') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Data Bank</a>

                                <!-- UNTUK MENGAMBIL DATA PESANAN
                                YANG BERSTATUS MENUNGGU VERIFIKASI Admin -->
                                <?php 
                                 $verPem = $this->Crud->numb_rows('pesanan', 'status', 'Menunggu Verifikasi Admin');
                                 ?>
                            <a class="nav-link" href="<?php echo base_url('manage/verifikasi-pembayaran') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Verifikasi Pembayaran <small class="badge badge-danger"><?php echo $verPem ?></small></a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $isLogin['nama_admin'] ?> - <?php echo $this->session->userdata('role') ?>
                    </div>
                </nav>
            </div>