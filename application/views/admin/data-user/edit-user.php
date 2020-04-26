<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-user') ?>" title="">Data User</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
    <h5>Edit Data Admin</h5>
    <div class="card card-body">
      <form action="<?php echo base_url('manage/data-user/edit/'.$user['user_id']) ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <label for="nama">Nama Admin</label>
          <input value="<?php echo $user['nama'] ?>" type="text" name="nama" placeholder="Masukan Nama Admin" class="form-control">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea rows="5" type="text" name="alamat" placeholder="Masukan Alamat Admin" class="form-control"><?php echo $user['alamat'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="notelp">No Telp / WA</label>
          <input type="text" value="<?php echo $user['notelp'] ?>" name="notelp" placeholder="Masukan Telp / WA Admin" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input value="<?php echo $user['email'] ?>" type="email" readonly name="email" placeholder="Masukan Email" class="form-control">
        <?php echo form_error('email', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="password">Password Baru</label>
          <input type="password" name="password2" placeholder="Masukan Password Baru" class="form-control">
        <?php echo form_error('password2', '<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group">
          <button class="btn btn-sm btn-primary" type="submit">Tambah</button>
        </div>
      </form>
    </div>    
  </div>
</div>
  