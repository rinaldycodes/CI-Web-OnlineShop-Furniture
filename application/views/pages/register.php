<section id="barang" class="bg-white py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7">
				<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<?= $this->session->flashdata('pesan') ?>
						<h5>Register</h5>
						<hr>
						<form action="<?= base_url('register') ?>" method="post" accept-charset="utf-8">
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
								<input type="submit" value="REGISTER" class="form-control btn btn-sm btn-primary">
								<hr>
								<a href="<?php echo base_url('/login') ?>" title="LOGIN" class="btn btn-sm btn-info form-control mb-3">LOGIN</a>
								<a href="<?php echo base_url('/') ?>" title="Home" class="btn btn-sm btn-secondary form-control">HOME</a>
							</div>
						</form>
					</div>
				</div>	
			</div>	
		</div>	<!-- row -->
	</div>
</section>
