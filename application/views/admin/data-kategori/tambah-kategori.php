<h1 class="mt-4"><?php echo $title ?></h1>
	<?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-kategori') ?>" title="">Data Kategori</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
	<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<?= $this->session->flashdata('pesan') ?>
						<h5>Tambah Kategori</h5>
						<hr>
						<form action="<?= base_url('manage/data-kategori/tambah') ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label for="kategori">Kategori - 
									<select name="kategori">
										<option>List Kategori</option>
										<?php foreach ($kategori->result_array() as $c): ?>
										<option value=""><?php echo $c['kategori'] ?></option>
										<?php endforeach ?>
									</select>
								</label>
								<input type="text" name="kategori" value="<?php echo set_value('kategori') ?>" class="form-control" placeholder="Masukan kategori...">
								<?php echo form_error('kategori', '<small class="text-danger">','</small>'); ?>
							</div>
							<div class="form-group">
								<input type="submit" value="Buat" class="form-control btn btn-sm btn-primary">
							</div>
						</form>
					</div>
				</div>
  </div>
</div>
  