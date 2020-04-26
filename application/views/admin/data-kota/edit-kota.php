<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
  <h5>Edit kota</h5>
    <div class="card card-body">
      <form action="<?php echo base_url('manage/data-kota/update/'.$kota['kota_id']); ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <label for="kota">Nama Kota</label>
          <input class="form-control" type="text" name="kota" value="<?php echo $kota['kota']?>">
                <?php echo form_error('kota', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="tarif">Tarif <small class="text-info">Rp.<?php echo number_format($kota['tarif'])?></small></label>
          <input class="form-control" type="text" name="tarif" value="<?php echo $kota['tarif']?>">
                <?php echo form_error('tarif', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-sm btn-primary">
        </div>  
      </form>     
    </div>    
  </div>
 
</div>
  