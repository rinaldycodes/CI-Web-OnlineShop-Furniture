<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
  <div class="col-xl-6 mb-3">
    <div class="card">
        <div class="card-body text-justfiy p-3">
          <p> <h5>Admin</h5>
            <ol>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-admin') ?>" title="Data Admin">Admin</a></i></li>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-user') ?>" title="Data User">User</a></i></li>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-produk') ?>" title="Data Produk">Produk</a></i></li>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-pesanan') ?>" title="Data Pesanan">Pesanan</a></i></li>
              <li><strong>Admin</strong> dapat mencetak laporan data <i><a href="<?php echo base_url('manage/data-pesanan') ?>" title="Data Pesanan">Pesanan</a></i></li>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-kategori') ?>" title="Data Kategori">Kategori</a></i></li>
              <li><strong>Admin</strong> dapat memanage data <i><a href="<?php echo base_url('manage/data-kota') ?>" title="Data Kota">Kota</a></i></li>
              <li><strong>Admin</strong> dapat mem-<i><a href="<?php echo base_url('manage/verifikasi-pembayaran') ?>" title="Data Verifikasi Pembayaran">Verifikasi Pembayaran</a></i></li>
            </ol>
          </p>   
        </div>  
    </div>  
  </div>
  <div class="col-xl-6 mb-3">
      <div class="card">
          <div class="card-body">
             <h2><?php echo $isLogin['nama_admin'] ?> <a href="<?= base_url('manage/edit-profil/'.$isLogin['admin_id']) ?>" class="btn btn-sm btn-primary">Edit Profil</a> <a href=""></a> </h2>
             <hr>
             <div class="form-group">
                <label for="">Alamat:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['alamat_admin'] ?></p>
                </blockquote>
             </div>
             <div class="form-group">
                <label for="">Telp / WA:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['notelp_admin'] ?></p>
                </blockquote>
             </div>
             <div class="form-group">
                <label for="">Email:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['email_admin'] ?></p>
                </blockquote>
             </div>
          </div>    
      </div>    
  </div>
  
</div>
  