<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="<?php echo base_url('dashboard') ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>
                            <a class="nav-link" href="<?php echo base_url('pesanan') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Pesanan</a>
                            <a class="nav-link" href="<?php echo base_url('konfirmasi-pembayaran') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Konfirmasi Pembayaran</a>
                            <!-- <a class="nav-link" href="<?php echo base_url('alamat-tagihan') ?>"
                                ><div class="sb-nav-link-icon"></div>
                                Alamat Tagihan</a> -->
                           <!--      
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div> -->
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: </div>
                        <?php echo $isLogin['nama'] ?> | <?php  echo $isLogin['user_id'] ?> - <?php echo $this->session->userdata('role') ?>
                    </div>
                </nav>
            </div>