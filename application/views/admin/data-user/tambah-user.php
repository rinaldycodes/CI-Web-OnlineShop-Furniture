<h1 class="mt-4"><?php echo $title ?></h1>
	<?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-user') ?>" title="">Data User</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
	<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<?= $this->session->flashdata('pesan') ?>
						<h5>Tambah User</h5>
						<hr>
						<form action="<?= base_url('manage/data-user/tambah') ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" name="nama" value="<?php echo set_value('nama') ?>" class="form-control" placeholder="Masukan Nama...">
								<?php echo form_error('nama', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input type="text" name="alamat" value="<?php echo set_value('alamat') ?>" class="form-control" placeholder="Masukan Alamat...">
								<?php echo form_error('alamat', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="notelp">No. Telp / WA</label>
								<input type="text" name="notelp" value="<?php echo set_value('notelp') ?>" class="form-control" placeholder="Masukan Nomor Telpon / WA...">
								<?php echo form_error('notelp', '<small class="text-danger">','</small>'); ?>
							</div>
							<hr>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" value="<?php echo set_value('email') ?>" name="email" class="form-control" placeholder="Masukan Email...">
								<?php echo form_error('email', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Masukan Password...">
								<?php echo form_error('password', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="password2">Konfirmasi Password</label>
								<input type="password" name="password2" class="form-control" placeholder="Masukan Konfirmasi Password...">
							</div>
							<div class="form-group">
								<input type="submit" value="Buat" class="form-control btn btn-sm btn-primary">
							</div>
						</form>
					</div>
				</div>
  </div>
</div>
  