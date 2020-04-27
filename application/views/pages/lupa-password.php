<section id="barang" class="bg-white py-5">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 mb-5">
				<div class="card">
					<div class="card-header bg-warning">
						Lupa Password
					</div>
					<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-xl-7">
							<?php echo $this->session->flashdata('pesan') ?>
							<form action="<?= base_url('lupa-password') ?>" method="post">

								<div class="form-group">
									<label for="">Pilih Metode</label>
									<select name="metode" id="" class="form-control">
										<option value="email">Email</option>
										<option value="no_telp">No Telpon / WA</option>
									</select>
								</div>
								<div class="form-group">
									<label for="">Masukan Email / No Telpon yang sesuai dengan metode</label>
									<input type="text" name="lupa_password" class="form-control">
								</div>
								<?= form_error('lupa_password', '<small class="text-danger">','</small>') ?>
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
