<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-user') ?>" title="">Data user</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body text-justfiy p-3">
          <div class="form-group bg-light px-3 py-2">
            <strong for="">Nama</strong>
            <p><?php echo $user['nama'] ?></p>
          </div>
          <div class="form-group bg-light px-3 py-2">
            <strong for="">Alamat</strong>
            <p><?php echo $user['alamat'] ?></p>
          </div>
          <div class="form-group bg-light px-3 py-2">
            <strong for="">No Telp / WA</strong>
            <p><?php echo $user['notelp'] ?></p>
          </div>
          <div class="form-group bg-light px-3 py-2">
            <strong for="">Email</strong>
            <p><?php echo $user['email'] ?></p>
          </div>  
        </div>  
    </div>  
  </div>
</div>
  