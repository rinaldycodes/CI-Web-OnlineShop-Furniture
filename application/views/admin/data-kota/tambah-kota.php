<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-6 mb-3">
	  <h5>Tambah Kota</h5>
	    <div class="card card-body">
	      <form action="<?php echo base_url('manage/data-kota/tambah'); ?>" method="post" accept-charset="utf-8">
	        <div class="form-group">
	          <label for="kota">Nama Kota</label>
	          <input class="form-control" type="text" name="kota">
	                <?php echo form_error('kota', '<small class="text-danger">','</small>'); ?>
	        </div>

	        <div class="form-group">
	          <label for="tarif">Tarif </label>
	          <input class="form-control" type="text" name="tarif">
	                <?php echo form_error('tarif', '<small class="text-danger">','</small>'); ?>
	        </div>

	        <div class="form-group">
	          <input type="submit" class="btn btn-sm btn-primary">
	        </div>  
	      </form>     
	    </div>    
  </div>

  <div class="col-xl-6 mb-3">
  	<h5>List Kota</h5>
	  	<div class="card card-body">
	  		<div class="row">
		  		<?php foreach ($kota->result_array() as $c): ?>
		  		<a class="btn btn-sm btn-info mx-1" href="#" title=""><?php echo $c['kota'] ?></a>
		  		<?php endforeach ?>
	  		</div>
	  	</div>
  </div>	
</div>
  