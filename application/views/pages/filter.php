<section id="barang" class="bg-white my-5">
	<div class="container">
		<div class="row mb-5"> <!-- row RANDOM PRODUK -->
			<div class="col-xl-12">
				<div class="row mb-3 container produk">
					<div class="produk-menu">
						<form action="<?php echo base_url('produk/filter') ?>" method="post" accept-charset="utf-8">
							<select name="filter">
								<option value="*" data-filter="*">Semua Produk</option>
								<option value="meja" data-filter=".meja">Meja</option>
								<option value="lemari" data-filter=".lemari">Lemari</option>
								<option value="kursi" data-filter=".kursi">Kursi</option>
							</select>	
								<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-filter"></i></button>		
						</form>
					</div>
				</div>	

					
				<h5>Produk <div style="background-color: #ffc107; height: 7px"></div></h5>
				<?php if (!empty($filter)): ?>
				<div id="txtHint" class="row">
					<?php 
						$random = $this->db->order_By('nama_produk', 'RANDOM')->limit(4)->get('produk'); 
					 	foreach ($random->result_array() as $c): 
						$kategori = $this->Crud->read('kategori', 'produk_id', $c['produk_id']);?>
						
					<div class="col-xl-3 col-sm-6 my-2">
						<div class="card">
							<div class="card-img">
								<img class="img-col-4" src="https://media.karousell.com/media/photos/products/2019/09/21/meja_makan_fabelio_1569040292_ddcbb08e_progressive.jpg" alt="Snow" style="width:100%;">
					  			<!-- <div class="top-right text-white"><span class="p-2 btn btn-sm btn-warning">Hemat 10%</span></div>
					  			<div class="top-left">Top Left</div> -->
							</div>
							<div class="card-body">
					  			<div class="text-center">
								<h6 class="card-title"><?php echo $c['nama_produk'] ?></h6>
								<p class="card-text btn btn-primary btn-sm">Rp. <?php echo number_format($c['harga'],0,'.','.') ?></p>	
								<a class="btn btn-sm btn-warning text-white form-control" style="font-weight: 700; font-size: 16px; letter-spacing: 2px" href="#" title="">Add to Cart</a>
								</div>	
							</div>
						</div>	
					</div>
					<?php endforeach; ?>
						
				</div>	
				<?php else: ?>
					<h5>Kategori yang anda cari tidak ada</h5>
				<?php endif; ?>

			</div>
		</div>

		<div class="row">
			<div class="col-xl-12">
				<h5>Produk Terbaru <div style="background-color: #ffc107; height: 7px"></div></h5>
				<div class="row">
					<?php foreach ($produk_terbaru->result_array() as $c): ?>
						<div class="col-xl-4 col-md-6 col-sm-6 my-4">
							<div class="card">
								<div class="card-header bg-warning"></div>
								<div class="card-body">
									<img class="img-col-4" src="https://media.karousell.com/media/photos/products/2019/09/21/meja_makan_fabelio_1569040292_ddcbb08e_progressive.jpg" alt="foto barang">
									<div class="text-center">
									<!-- <small class="text-muted">Meja</small> -->
									<h6 class="mt-2 card-title"><?php echo $c['nama_produk'] ?></h6>
									<p class="card-text btn btn-primary btn-sm">Rp. <?php echo number_format($c['harga'],0,'.','.') ?></p>
									<a class="btn btn-sm btn-warning text-white form-control" style="font-weight: 700; font-size: 16px; letter-spacing: 2px" href="#" title="">Add to Cart</a>
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
