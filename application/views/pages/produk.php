<section id="barang" class="bg-white my-5">
	<div class="container">
		<div class="row mb-5"> <!-- row 1 start-->
			<!-- KATEGORI -->
			<div class="col-xl-12">
				<div class="kategori-menu">
					<div class="kategori-item">
						<a class="btn btn-sm btn-warning m-1" href="<?php echo base_url('produk') ?>" title="produk">All</a>
						<?php foreach ($kategori as $key => $value): ?>
							<a class="btn btn-sm btn-warning m-1" href="<?php echo base_url('produk/'.$value['kategori']) ?>" title="<?php echo $value['kategori'] ?>"><?php echo strtoupper($value['kategori']) ?></a>
						<?php endforeach ?>
					</div>	
				</div>	
			</div>
			<!-- PRODUK -->
			<div class="col-xl-12">
				<?php if ($kategori): ?>
				<h5><?php echo $title ?> <div style="background-color: #ffc107; height: 7px"></div></h5>
					
				<?php else: ?>
				<h5>Produk <div style="background-color: #ffc107; height: 7px"></div></h5>
				<?php endif; ?>
				<div class="row">
					<?php if (!empty($produk)): ?>
						<?php 
							$random = $this->db->order_By('nama_produk', 'RANDOM')->limit(4)->get('produk'); 
						 	foreach ($produk as $c): 
						 	$kategori = $this->db->get_where('kategori', ['kategori_id'=>$c['kategori_id']])->row_array();
							?>
						<div class="col-xl-3 col-sm-6 my-2">
							<div class="card">
								<div class="card-img">
									<a href="<?php echo base_url('produk/'.$kategori['kategori'].'/'.$c['slug_produk']) ?>" title="">
										<img class="img-col-4" src="<?php echo base_url('assets/images/'.$c['foto']) ?>" alt="Snow" style="width:100%;">
									</a>
								</div>

								<div class="card-body">
						  			<div class="text-center">
						  				<div class="produk-item">
											<h6 class="card-title"><?php echo substr($c['nama_produk'], 0, 50) ?>...</h6>
						  				</div>
						  				<div class="produk-item">
										<p class="card-text btn btn-primary btn-sm">Rp. <?php echo number_format($c['harga'],0,'.','.') ?></p>	
						  				</div>
						  				<div class="produk-item">
										<a class="btn btn-sm btn-warning text-white form-control" style="font-weight: 700; font-size: 16px; letter-spacing: 2px" href="<?php echo base_url('tambah-keranjang/'.$c['produk_id']) ?>" title="">Add to Cart</a>
						  					
						  				</div>
									</div>	
								</div>
							</div>	
						</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="col-xl-12">
							<h5>Kategori Kosong</h5>
						</div>	
					<?php endif; ?>
						
				</div>
			</div>
		</div> <!-- row 1 end -->


		<!-- PRODUK TERBARU -->
		<div class="row">
			<div class="col-xl-12">
				<h5>Produk Terbaru <div style="background-color: #ffc107; height: 7px"></div></h5>
				<div class="row">
					<?php foreach ($produk_terbaru->result_array() as $c): ?>
						<div class="col-xl-4 col-md-6 col-sm-6 my-4">
							<div class="card">
								<div class="card-header bg-warning"></div>
								<div class="card-body">
									<img class="img-col-4" src="<?php echo base_url('assets/images/'.$c['foto']) ?>">
									<div class="text-center">
									<!-- <small class="text-muted">Meja</small> -->
									<h6 class="mt-2 card-title"><?php echo substr($c['nama_produk'], 0, 30) ?>..</h6>
									<p class="card-text btn btn-primary btn-sm">Rp. <?php echo number_format($c['harga'],0,'.','.') ?></p>
									<a class="btn btn-sm btn-warning text-white form-control" style="font-weight: 700; font-size: 16px; letter-spacing: 2px" href="<?php echo base_url('tambah-keranjang/'.$c['produk_id']) ?>" title="">Add to Cart</a>
									</div>	
								</div>
							</div>	<!-- card -->
						</div> <!-- col -->
					<?php endforeach; ?>
					
					
				</div>
			</div>
		</div>	<!-- row -->
	</div>
</section>
