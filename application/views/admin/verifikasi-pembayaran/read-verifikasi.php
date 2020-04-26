<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
  <h5>Verifikasi Pembayaran</h5>
    <div class="card">
        <div class="card-header">
         
        </div>  
        <div class="card-body text-justfiy p-3">
         <div class="row">
          <div class="col-xl-4">
            <div class="form-group">
             <h5><u>Nama Account</u></h5>
             <strong><?php echo $konfirmasi_pembayaran['nama_account'] ?></strong>
            </div>

            <div class="form-group">
              <h5><u>No. Rekening</u></h5>
              <strong><?php echo $konfirmasi_pembayaran['no_rek'] ?></strong>   
            </div>

            <div class="form-group">
              <h5><u>Nominal Pembayaran</u></h5>
              <strong>Rp.<?php echo number_format($konfirmasi_pembayaran['nominal_pembayaran']) ?></strong>   
            </div>

            <div class="form-group">
              <a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/verifikasi-pembayaran/verifikasi/'. $konfirmasi_pembayaran['pesanan_id']) ?>" title="Verifikasi">Verifikasi</a>
            </div>
          </div>


          <div class="col-xl-4">
            <div class="form-group">
              <img src="<?php echo base_url('assets/images/'. $konfirmasi_pembayaran['foto_struk']) ?>" height="400" width="100%" alt="foto struk">
            </div>  
          </div>

          <div class="col-xl-4">
            <div class="form-group text-right">
              <h5><u>Tanggal Transfer</u></h5>
              <strong><?php echo tanggal($konfirmasi_pembayaran['tgl_transfer'])  ?></strong>   
            </div>
          </div>
         </div> 
        </div>  
    </div>  
  </div>
 
</div>
  