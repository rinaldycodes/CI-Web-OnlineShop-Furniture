<h1 class="mt-4"><?php echo $title ?></h1>
	<?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-kategori') ?>" title="">Data Bank</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
	<div class="card">
					<div class="card-header bg-warning"></div>
					<div class="card-body">
						<h5>Tambah Bank</h5>
						<hr>
						<form action="<?= base_url('manage/data-bank/tambah') ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label for="kategori">Bank - 
									<select name="kategori">
										<option>List Bank</option>
										<?php foreach ($bank->result_array() as $c): ?>
										<option value=""><?php echo $c['payment'] ?></option>
										<?php endforeach ?>
									</select>
								</label>
								<input type="text" name="bank" value="<?php echo set_value('bank') ?>" class="form-control" placeholder="Masukan bank...">
								<?php echo form_error('bank', '<small class="text-danger">','</small>'); ?>
							</div>

							<div class="form-group">
								<label for="">No. REKENING</label>
								<input type="text" class="form-control" placeholder="Masukan no rekening" name="no_rek">
								<?php echo form_error('no_rek', '<small class="text-danger">','</small>'); ?>
							</div>

							<div class="form-group">
								<input type="submit" value="Buat" class="form-control btn btn-sm btn-primary">
							</div>
						</form>
					</div>
				</div>
  </div>
</div>
  