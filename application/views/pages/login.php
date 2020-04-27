<section id="barang" class="bg-white py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-5">
				<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<?= $this->session->flashdata('pesan') ?>
						<h5>Login</h5>
						<?php echo $this->session->userdata('nama') ?>
						<hr>
						<form action="<?= base_url('cekLogin') ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name="email" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" value="LOGIN" class="form-control btn btn-sm btn-primary">
								<a href="<?= base_url('lupa-password') ?>">Lupa Password?</a>
								<hr>
								<a href="<?php echo base_url('/register') ?>" title="Register" class="btn btn-sm btn-info form-control mb-3">REGISTER</a>
								<a href="<?php echo base_url('/') ?>" title="Home" class="btn btn-sm btn-secondary form-control">HOME</a>
							</div>
						</form>
					</div>
				</div>	
			</div>	
		</div>	<!-- row -->
	</div>
</section>
