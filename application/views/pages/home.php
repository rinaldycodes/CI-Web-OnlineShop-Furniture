<section id="barang" class="bg-white my-5">
	<div class="container">
		<?= $this->session->flashdata('pesan') ?>
		<div class="row mb-5"> <!-- row RANDOM PRODUK -->
			<div class="col-xl-12">
				<h5>Random Produk <div style="background-color: #ffc107; height: 7px"></div></h5>
				<div class="row">
					<?php 
						$random = $this->db->where('stok >', 0)->order_By('nama_produk', 'RANDOM')->limit(4)->get('produk'); 
					 	foreach ($random->result_array() as $c): 
					 	$kategori = $this->db->get_where('kategori', ['kategori_id'=>$c['kategori_id']])->row_array();
						?>
					<div class="col-xl-3 col-sm-6 my-2">
						<div class="card">
							<div class="card-img">
								<a href="<?php echo base_url('produk/'.$kategori['kategori'].'/'.$c['slug_produk']) ?>" title="">
									<img class="img-col-4" src="<?php echo base_url('assets/images/'.$c['foto']) ?>" alt="<?= $c['nama_produk'] ?>" style="width:100%;">
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
						
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<h5>Produk Terbaru <div style="background-color: #ffc107; height: 7px"></div></h5>
				<div class="row">
					<?php foreach ($produk_terbaru->result_array() as $c): ?>
						<div class="col-xl-4 col-md-6 col-sm-6 my-2">
							<div class="card">
							<div class="card-img">
								<a href="<?php echo base_url('produk/'.$kategori['kategori'].'/'.$c['slug_produk']) ?>" title="">
									<img class="img-col-4" src="<?php echo base_url('assets/images/'.$c['foto']) ?>" alt="Snow" style="width:100%;">
						  			<div class="top-right text-white"><span class="p-2 btn btn-sm btn-success">TERBARU</span></div>
								<a href="" title=""></a>
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
						</div> <!-- col -->
					<?php endforeach; ?>
					
					
				</div>
			</div>
		</div>	<!-- row -->
	</div>
</section>
