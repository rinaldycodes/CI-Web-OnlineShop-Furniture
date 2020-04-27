<div class="container bg-light p-5 my-5">
	<h3 class="text-center">Invoice</h3>
	<hr>
	<div class="row"> <!-- row1 -->
		<!-- <div class="col-xl-3">
			
		</div> -->


		<div class="col-xl-8">
			<div class="my-3">
				<h6>Detail Pembayaran</h6>
				<ul>
					<?php foreach ($invoice as $c): ?>
					<?php endforeach ?>
					<?php  $payment = $this->db->get_where('payment', ['payment_id'=>$c['payment_id']])->row_array(); ?>
						<li>Payment: <?php echo $payment['payment'] ?> </li>
					<li>Nama Pemilik: Rio</li>
					<li>No. Rek: XXXXXXXXXXX</li>
				</ul>
			</div>
			<div class="my-3">
				<h6>Detail Pesanan</h6>
				<div class="row">
					<div class="col-8">
						<strong>PRODUK</strong>
								<hr>
									<p>
									<?php foreach ($invoice as $c): ?>
										<?php echo $c['nama_produk'] ?>
										<small>x
										<strong><?php echo $c['quantity'] ?></strong>
										</small> <br>
										Berat <?php echo $c['berat'] ?>kg x Rp.10.000 x <?php echo $c['quantity'] ?> <br>
										<hr>
										
									<?php endforeach ?>
										Ongkir - JP <?php echo $c['jasa_pengiriman'] ?> - <?php echo $c['kota'] ?>
									</p>
					</div>


					<div class="col-4 text-right">
						<strong>SUB-TOTAL</strong>
							<hr>
								<p class="text-right" style="height: 50px">
									<?php foreach ($invoice as $c): ?>
										<strong>Rp.<?php echo number_format($c['harga_total'],0,'.','.') ?></strong> 
										<br>
										<!-- <strong>Rp.<?php echo number_format($c['quantity']*10000*$c['berat'],0,'.','.') ?></strong>  -->
										<br>
										<hr>
									<?php endforeach ?>
										<p class="text-right"><strong>Rp.<?php echo number_format($c['tarif'],0,'.','.') ?></strong></p> 
								</p>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-6">
						<h5>Total</h5>
					</div>	
					<div class="col-6 text-right">
						<strong>Rp.<?php echo number_format($this->Pesanan_model->total_harga($c['pesanan_id'])+$c['tarif'],0,'.','.') ?></strong>
					</div>
				</div>
			</div>
		</div>


		<div class="col-xl-4">
			<div class="my-3">
				<div class="card card-body">
					<h6>Terima Kasih.</h6>
					<ul>
						<?php $pesanan	=	$this->db->get_where('pesanan', ['pesanan_id'=>$this->session->userdata('pesanan_id')])->row_array(); ?>
						<li>No. Invoice: <strong><?php echo $pesanan['pesanan_id'] ?></strong></li>
						<li>Tanggal Pesan: <strong><?php echo tanggal($pesanan['tgl_pesan']) ?></strong></li>
					</ul>
				</div>
			</div>
			<div class="my-3">
				<a class="form-control btn btn-sm btn-primary" href="<?php echo base_url('cetak-invoice') ?>" title="Cetak Invoice" rel="no follow" target="_blank">Cetak</a>
			</div>
			<div class="my-3 alert alert-info">
				<small>
					Lakukan pembayaran langsung ke rekening bank kami. Silahkan gunakan No. Invoice Anda sebagai referensi pembayaran. <br> Pesanan Anda tidak akan dikirim sampai dana telah Kami terima. Lalu lakukan konfirmasi pembayaran
				</small>				
			</div>		
		</div>

	</div><!-- /row1  -->
</div>		