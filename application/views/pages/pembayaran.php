<div class="container my-5">
	<h5>Pembayaran & Alamat Pengiriman</h5>

	<hr>

	<div class="row my-5"> <!--  row 1 start -->
		<div class="col-xl-6">
			<div class="card card-body">
				<form  action="<?php echo base_url('selesai-belanja') ?>" method="post" accept-charset="utf-8">

					<!-- hidden -->
					<?php if ($this->session->userdata('role') == 'admin'): ?>
						<?php  $isLogin  = $this->db->get_where('admin', ['email_admin'=>$this->session->userdata('email')])->row_array(); ?>
					<input type="text" name="user_id" value="<?php echo $isLogin['admin_id'] ?>" hidden>
					<?php elseif ($this->session->userdata('role') == 'user'): ?>
						<input type="text" name="user_id" value="<?php echo $isLogin['user_id'] ?>"  hidden>
					<?php endif; ?>
					<!-- hidden -->

					<div class="form-group">
						<label for="nama">Nama Lengkap Penerima <small class="text-danger">*</small></label>
						<input type="text" name="nama" class="form-control" autofocus="" required>
					</div>	


					<div class="form-group">
						<label for="nama">No. Telepon / WA<small class="text-danger">*</small></label>
						<input type="text" name="notelp" class="form-control" required>
					</div>


					<div class="form-group">
						<label for="alamat">Alamat Lengkap<small class="text-danger">*</small></label>
						<textarea required rows="5" type="text" placeholder="Alamat Lengkap" name="alamat" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="kota">Pilih Kota<small class="text-danger">*</small></label>
						<select name="kota" class="form-control">
							<?php foreach ($kota->result_array() as $c): ?>
								<option value="<?php echo $c['kota_id'] ?>"><?php echo $c['kota'] ?></option>}
							<?php endforeach ?>
						</select>
					</div>	

					<div class="form-group">
						<label for="jasa_pengiriman">Jasa Pengiriman<small class="text-danger">*</small></label>
						<select name="jasa_pengiriman" class="form-control">
							<?php foreach ($jasa_pengiriman->result_array() as $c): ?>
								<option value="<?php echo $c['jp_id'] ?>"><?php echo $c['jasa_pengiriman'] ?></option>}
							<?php endforeach ?>
						</select>
					</div>		


					<div class="form-group">
						<label for="bank">Bank Payment<small class="text-danger">*</small></label>
						<select name="payment" class="form-control">
							<?php foreach ($payment->result_array() as $c): ?>
								<option value="<?php echo $c['payment_id'] ?>"><?php echo $c['payment'] ?></option>}
							<?php endforeach ?>
						</select>
					</div>

					<button type="submit" class="btn btn-sm btn-warning form-control" title="Selesai Belanja"><h6>SELESAI BELANJA</h6></button>
				</form>
			</div>
		</div>


		<div class="col-xl-6">
			<div class="card card-body">
				<header id="header" class="bg-light text-center">
					<h4 class="text-muted">Pesanan Kamu</h4>
				</header><!-- /header -->
				<div id="pesanan" class="row mt-3">
					<div class="col-7">
						<h6>Produk</h6>
							<?php foreach ($this->cart->contents() as $c): ?>
								<hr>
									<p>
										<?php echo $c['name'] ?>
										<small>x
										<strong><?php echo $c['qty'] ?></strong>
										</small> <br>
										Harga Berat Rp.<?php echo number_format($c['harga_berat'],0,'.','.') ?>
										<small>x
										<strong><?php echo $c['qty'] ?></strong>
										</small>
									</p>
							<?php endforeach ?>
					</div>


					<div class="col-5">
							<h6 class="text-right">Subtotal</h6>
						<?php foreach ($this->cart->contents() as $c): ?>
							<hr>
								<p class="text-right" style="height: 50px">
									<strong>Rp.<?php echo number_format($c['subtotal'],0,'.','.') ?></strong> 
								</p>
						<?php endforeach ?>
						<p class="text-right">
							
						</p>
					</div>	
				</div>	
					<hr>
				<div class="row">
					<div class="col-6">
						<h5>Total</h5>
					</div>	
					<div class="col-6 text-right">
						<strong>Rp.<?php echo number_format($this->cart->total(),0,'.','.') ?></strong>
					</div>
				</div>	

				
			</div>
		</div>		
	</div><!-- row 1 end -->

	
</div>	