<h1 class="mt-4">Konfirmasi Pembayaran</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>" title="">Dashboard</a></li>
    <li class="breadcrumb-item active">Konfirmasi Pembayaran</li>
</ol>
<?php echo $this->session->userdata('pesan') ?>
<div class="row">
  <div class="col-xl-12">

    <?php echo $noInvoice['pesanan_id'] ?>
      <div class="card card-body">
        <form action="<?php echo base_url('konfirmasi-pembayaran/proses') ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <!-- hidden -->
          <input type="text" name="pesanan_id" value="<?php echo $noInvoice['pesanan_id'] ?>" hidden>
          <!-- hidden -->
          <div class="form-group">
            <label for="no_rek">No. Rekening</label>
            <input type="text" name="no_rek" class="form-control">
            <?php echo form_error('no_rek', '<small class="text-danger">','</small>') ?>
          </div> 
          

          <div class="form-group">
            <label for="nama_account">Nama Account</label>
            <input type="text" name="nama_account" class="form-control">
            <?php echo form_error('nama_account', '<small class="text-danger">','</small>') ?>
          </div>
          

          <div class="form-group">
            <label for="tgl_transfer">Tanggal Transfer</label>
            <input type="date" name="tgl_transfer" class="form-control">
            <?php echo form_error('tgl_transfer', '<small class="text-danger">','</small>') ?>
          </div>


          <div class="form-group">
            <label for="nominal_pembayaran">Nominal Pembayaran</label>
            <input type="number" placeholder="Contoh: 50000 untuk 50rb" name="nominal_pembayaran" class="form-control">
            <?php echo form_error('tgl_transfer', '<small class="text-danger">','</small>') ?>
          </div> 

          <div class="form-group">
            <label for="">Foto Struk</label>
            <input type="file" name="foto" class="form-control" placeholder="Masukan foto...">
          </div>    


          <div class="form-group">
            <input type="submit" class="btn btn-sm btn-primary">
          </div>  
        </form>
      </div>
    <!-- / form PEMBAYARAN -->
  </div>
</div>
  