<h1 class="mt-4"><?php echo $title ?></h1>
	<?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-produk') ?>" title="">Data Produk</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
	<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								<h5>Tambah Foto Produk</h5>
							</div>
							<div class="col-6 text-right">
								<a class="btn btn-sm btn-danger" href="<?php echo base_url('tambah-foto/hapus-semua/'.$produk['produk_id']) ?>" title="Hapus semua foto produk">Hapus Semua</a>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-xl-12">
								<form action="<?= base_url('tambah-foto/'.$produk['slug_produk'].'/store') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
									<!-- hidden -->
									<input type="text" name="produk_id" value="<?php echo $produk['produk_id'] ?>" hidden>
									<!-- hidden -->
									<div class="form-group">
										<label for="foto">Foto</label>
										<input type="file" value="<?php echo set_value('foto') ?>" name="foto" class="form-control" placeholder="Masukan foto...">
										<?php echo form_error('foto', '<small class="text-danger">','</small>'); ?>
									</div>
									<div class="form-group">
										<input type="submit" value="Buat" class="form-control btn btn-sm btn-primary">
									</div>
								</form>
							</div>
						</div>	
						<hr>
						<?php if (!empty($foto)): ?>
							<div class="row p-2">
								<?php foreach ($foto->result_array() as $c): ?>
									<div class=" col-xl-3 col-6 col-md-4 mb-3">
										<div class="card card-body">
										<img src="<?php echo base_url('assets/images/'.$c['foto']) ?>" alt="foto" width="100%" height="150">
										</div>
									</div>
								<?php endforeach ?>
							</div>
						<?php else: ?>
							<h5 class="text-center py-5 alert alert-warning">Anda Belum Menambahkan Foto lain</h5>
						<?php endif; ?>
					</div>
				</div>
  </div>
</div>
  