<section id="barang" class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 mb-5">
				<div class="card">
					<div class="card-header bg-warning">
						Reset Password
					</div>
					<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-xl-7">
							<?php echo $this->session->flashdata('pesan') ?>
							<form action="<?= base_url('proses-reset-password') ?>" method="post">
								<div class="form-group">
									<label for="">Lengkapi No Telpon / WA dibawah ini</label>
									<input readonly="" value="<?= substr($user['notelp'],0,5) ?>*********" class="form-control">
								</div>
								<div class="form-group">
									<label for="">Lengkapi disini</label>
									<input type="text" name="lupa_password" class="form-control">
									<?= form_error('lupa_password', '<small class="text-danger">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="">Password Baru</label>
									<input type="password" name="password" class="form-control">
									<?= form_error('password', '<small class="text-danger">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="">Konfirmasi Password</label>
									<input type="password" name="konfirmasi_password" class="form-control">
									<?= form_error('konfirmasi_password', '<small class="text-danger">','</small>') ?>
								</div>
								<div class="my-3">
									<button type="submit" class="btn btn-sm btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
					</div>		
				</div>
			</div>	<!-- col1 -->
		</div>	<!-- row 1 -->
	</div><!-- container1 -->
</section>
