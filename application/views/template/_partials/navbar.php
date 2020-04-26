<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    
    <a class="navbar-brand" href="#"><?php echo NAMA_WEB;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item <?= $this->uri->segment(1) == 'home' ? 'aktif' : '' ?>">
          <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == 'produk' ? 'aktif' : '' ?>">
          <a class="nav-link" href="<?= base_url('produk')?>">Produk</a>
        </li>
        <li class="nav-item <?= $this->uri->segment(1) == 'kontak' ? 'aktif' : '' ?>">
          <a class="nav-link" href="<?= base_url('kontak')?>">Kontak</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            MORE...
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown <?= $this->uri->segment(1) == 'keranjang-belanja' ? 'aktif' : '' ?>">
          <a class="nav-link <?= $this->uri->segment(1) == 'keranjang-belanja' ? 'aktif' : '' ?>" href="<?php echo base_url('keranjang-belanja') ?>" title="">
            <small>Keranjangz: <?php echo $keranjang = $this->cart->total_items() ?></small> 
          </a>
         
        </li>
        <?php if ( $this->session->userdata('role') == 'user' ): ?>
        <li class="nav-item dropdown <?= $this->uri->segment(1) == 'login' ? 'aktif' : '' ?>">
          <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo $isLogin['nama'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('dashboard/'. $isLogin['user_id']) ?>">Dashboard</a>
            <hr>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
          </div>
        </li>


        <?php elseif ( $this->session->userdata('role') == 'admin' ): ?>
          <?php  $isLogin  = $this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array(); ?>
          <li class="nav-item dropdown <?= $this->uri->segment(1) == 'login' ? 'aktif' : '' ?>">
          <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> <?php echo $isLogin['nama_admin'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('manage') ?>">Manage</a>
            <hr>
            <a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a>
          </div>
        </li>


        <?php else: ?>
        <li class="nav-item dropdown <?= $this->uri->segment(1) == 'login' ? 'aktif' : '' ?>">
          <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user"></i> Login / Register
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('login') ?>">Login</a>
            <a class="dropdown-item" href="<?= base_url('register') ?>">Register</a>
          </div>
        </li>
        <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>