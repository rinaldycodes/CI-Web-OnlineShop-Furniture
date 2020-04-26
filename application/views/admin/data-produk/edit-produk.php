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
						<h5>Edit Produk</h5>
						<hr>
						<form action="<?= base_url('manage/data-produk/edit/'.$produk['slug_produk']) ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<!-- hiden field -->
							<input type="text" name="file_lama" value="<?php echo $produk['foto'] ?>" hidden>
							<!-- hiden field -->
							<div class="form-group">
								<label for="nama">Nama Produk</label>
								<input type="text" name="nama_produk" value="<?php echo $produk['nama_produk'] ?>" class="form-control" placeholder="Masukan Nama Produk">
								<?php echo form_error('nama_produk', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="harga">Harga Produk <small class="badge badge-info">contoh: 50000 untuk 50rb</small></label>
								<input type="text" name="harga" value="<?php echo $produk['harga'] ?>" class="form-control" placeholder="Masukan Harga Produk">
								<?php echo form_error('harga', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="nama">Kategori
								</label>
								<select name="kategori">
									<?php foreach ($kategori->result_array() as $c): ?>
										<option value="<?php echo $c['kategori_id'] ?>"><?php echo ucfirst($c['kategori']) ?></option>
									<?php endforeach ;?>
								</select>
								<?php echo form_error('kategori', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="keterangan_produk">Keterangan Produk</label>
								<textarea class="form-control" rows="5" id="editor1" name="keterangan_produk"><?php echo $produk['keterangan_produk'] ?>"</textarea>
								<?php echo form_error('keterangan_produk', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="berat">Berat <small class="text-muted">(satuan Kilogram)</small></label>
								<input type="text" name="berat" value="<?php echo $produk['berat'] ?>" class="form-control" placeholder="Contoh : 3, 7, 10, dan seterusnya">
								<?php echo form_error('berat', '<small class="text-danger">','</small>'); ?>
							</div>
							<hr>
							<div class="form-group">
								<label for="foto">Foto</label>
								<input type="file" value="<?php echo set_value('foto') ?>" name="foto" class="form-control" placeholder="Masukan foto...">
								<?php echo form_error('foto', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<label for="stok">Stok</label>
								<input type="text" name="stok" class="form-control" value="<?php echo $produk['stok'] ?>" placeholder="Masukan stok...">
								<?php echo form_error('stok', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<input type="submit" value="Buat" class="form-control btn btn-sm btn-primary">
							</div>
						</form>
					</div>
				</div>
  </div>
</div>
  