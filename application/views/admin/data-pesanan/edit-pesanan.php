<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
  <h5>Edit pesanan</h5>
    <div class="card card-body">
      <form action="<?php echo base_url('manage/data-pesanan/update/'.$pesanan['pesanan_id']); ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
          <label for="nama_penerima">Nama Penerima</label>
          <input class="form-control" type="text" name="nama_penerima" value="<?php echo $pesanan['nama_penerima']?>">
                <?php echo form_error('nama_penerima', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="notelp">No. Telpon / WA</label>
          <input class="form-control" type="text" name="notelp" value="<?php echo $pesanan['notelp']?>">
                <?php echo form_error('notelp', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat Penerima</label>
          <textarea  class="form-control" type="text" name="alamat"><?php echo $pesanan['alamat']?></textarea>
                <?php echo form_error('alamat', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="tgl_pesan">Tanggal Pesan <small class="text-info"><?php echo $pesanan['tgl_pesan']?></small></label>
          <input readonly="" class="form-control" type="datetime" name="tgl_pesan" value="<?php echo $pesanan['tgl_pesan']?>">
                <?php echo form_error('tgl_pesan', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <label for="status">Status <small class="text-info"><?php echo $pesanan['status']?></small></label>
          <input class="form-control" type="text" name="status" value="<?php echo $pesanan['status']?>">
                <?php echo form_error('status', '<small class="text-danger">','</small>'); ?>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-sm btn-primary">
        </div>  
      </form>     
    </div>    
  </div>
 
</div>
  