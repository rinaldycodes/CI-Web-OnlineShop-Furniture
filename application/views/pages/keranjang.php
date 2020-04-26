<div class="container my-5">
	<h5>Keranjang Belanja</h5>

	<?php if (!empty($this->cart->contents())): ?>
		<div class="table-responsive">
			<table class="table table-hover table-xl table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Produk</th>
						<th>Berat <small>Rp.10.000/kg</small></th>
						<th width="10">Quantity</th>
						<th>Harga</th>
						<th>Sub total</th>
					</tr>
				</thead>
				<tbody>

					<?php $u = 1;
					 foreach ($this->cart->contents() as $c): ?>

						<tr>
							<td><?php echo $u++ ?></td>
							<td ><?php echo $c['name'] ?></td>
							<td class="text-center">
								<?php 
								echo $c['berat']*$c['qty'] ?> kg <br>
								<small>Rp.<?php echo number_format($c['harga_berat']*$c['qty'],0,'.','.') ?></small>
							</td>
							<td>
								<form action="<?php echo base_url('update-keranjang/'.$c['rowid']) ?>" method="post" accept-charset="utf-8">
									<!-- hidden -->
									<input type="text" name="rowid" value="<?php echo $c['rowid'] ?>" hidden>
									<!-- hidden -->
									<input class="form-control" type="number" min="1" max="<?php echo $c['stok'] ?>" value="<?php echo $c['qty'] ?>" maxlength="3" name="quantity">
									<button type="submit">UPDATE</button>
								</form>
							</td>
							<td class="text-right">Rp.<?php echo number_format($c['price'],0,'.','.') ?></td>
							<td class="text-right">Rp.<?php echo number_format($c['subtotal'],0,'.','.') ?></td>
						</tr>


					<?php endforeach; ?>

						<tr class="bg-light text-right">
							<td colspan="5" rowspan="" headers=""><h5>Total Harga</h5></td>
							<td colspan="" rowspan="" headers=""><h5>Rp.<?php echo number_format($this->cart->total(),0,'.','.') ?></h5></td>
						</tr>		

				</tbody>
			</table> <!-- table -->
		</div> <!-- /table responsive -->


		<div class="keranjang-menu py-3 row justify-content-center">
			<div class="keranjang-item col-4">
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('hapus-keranjang') ?>" title="Hapus Keranjang">Batalkan</a>
			</div>	
			<div class="keranjang-item col-4 text-center">
				<a class="btn btn-primary btn-sm" href="<?php echo base_url('produk') ?>" title="Lanjut bos">Lanjut Belanja</a>
			</div>
			<div class="keranjang-item col-4 text-right">
				<a class="btn btn-success btn-sm" href="<?php echo base_url('pembayaran') ?>" title="Lanjutkan Pembayaran">Pembayaran</a>
			</div>	
		</div>	


	<?php else: ?>
		<div class="no-data" style="margin: 100px 0 300px 0; align-items: center;">
			<h5 class=" text-center alert alert-warning my-5">Oops anda belum memilih produk <a class="btn-sm btn btn-light" href="<?php echo base_url('produk') ?>" title="">Browse Produk</a></h5>
		</div>	
	<?php endif; ?>
	

	
</div>	