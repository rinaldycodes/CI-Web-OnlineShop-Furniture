<h1 class="mt-4">Edit Profil</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Edit Profil</li>
</ol>
<div class="row">
  <div class="col-xl-6 mb-3">
      <div class="card">
          <div class="card-body">
            <form action="<?= base_url('manage/edit-profil/'.$admin['admin_id']) ?>" method="post">
             <div class="form-group">
                <label for="">Nama:</label>
                <input type="text" value="<?= $admin['nama_admin'] ?>" name="nama_admin" class="form-control">
                <?php echo form_error('nama_admin','<small class="text-danger">','</small>') ?>
             </div>
             <div class="form-group">
             <div class="form-group">
                <label for="">Email:</label>
                <input name="email_admin" readonly="" type="email"class="form-control" value="<?php echo $admin['email_admin'] ?>">
             </div>
                <label for="">Alamat:</label>
                <textarea name="alamat_admin" class="form-control" id="" cols="10" rows="5"><?php echo $admin['alamat_admin'] ?></textarea>
             </div>
             <div class="form-group">
                <label for="">Telp / WA:</label>
                <input name="notelp_admin" type="text"class="form-control" value="<?php echo $admin['notelp_admin'] ?>">
                <?php echo form_error('notelp_admin','<small class="text-danger">','</small>') ?>
             </div>
             <div class="form-group">
              <button type="submit" class="btn btn-sm btn-primary">Edit</button>
             </div>
            </form>
          </div>    
      </div>    
  </div>
</div>
  