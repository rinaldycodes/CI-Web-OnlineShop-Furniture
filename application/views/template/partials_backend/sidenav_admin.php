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

                                <!-- UNTUK MENGAMBIL DATA PESANAN
                                YANG BERSTATUS MENUNGGU VERIFIKASI Admin -->
                                <?php 
                                 $verPem = $this->Crud->numb_rows('pesanan', 'status', 'Menunggu Verifikasi Admin');
                                 ?>
                            <a class="nav-link" href="<?php echo base_url('manage/verifikasi-pembayaran') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Verifikasi Pembayaran <small class="badge badge-danger"><?php echo $verPem ?></small></a>
                                
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $isLogin['nama_admin'] ?> - <?php echo $this->session->userdata('role') ?>
                    </div>
                </nav>
            </div>