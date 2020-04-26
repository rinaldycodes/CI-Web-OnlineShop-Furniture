<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-admin') ?>" title="">Data Admin</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
    <h5>Edit Data Admin</h5>
    <div class="card card-body">
      <form action="<?php echo base_url('manage/data-admin/edit/'.$admin['admin_id']) ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <label for="nama">Nama Admin</label>
          <input value="<?php echo $admin['nama_admin'] ?>" type="text" name="nama_admin" placeholder="Masukan Nama Admin" class="form-control">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea rows="5" type="text" name="alamat_admin" placeholder="Masukan Alamat Admin" class="form-control"><?php echo $admin['alamat_admin'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="notelp">No Telp / WA</label>
          <input type="text" name="notelp_admin" placeholder="Masukan Telp / WA Admin" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input value="<?php echo $admin['email_admin'] ?>" type="email" readonly name="email_admin" placeholder="Masukan Email" class="form-control">
        <?php echo form_error('email_admin', '<small class="text-danger">','</small>'); ?>
        </div>
        <div class="form-group">
          <label for="password">Current Password</label>
          <input type="password" name="password" placeholder="Masukan Password" class="form-control">
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
  