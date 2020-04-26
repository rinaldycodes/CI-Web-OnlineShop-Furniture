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
          <div class="col-xl-6">
            <form action="<?php echo base_url('verifikasi-pembayaran/proses/'.$konfirmasi_pembayaran['pesanan_id']) ?>" method="post" accept-charset="utf-8">
              <div class="form-group">
               <h5>Nama Account</h5>
               <input type="text" name="nama_account" class="form-control" value="<?php echo $konfirmasi_pembayaran['nama_account'] ?>">
              </div>
             
              <div class="form-group">
                <h5>No. Rekening</h5>
                <input type="text" name="nama_account" class="form-control" value="<?php echo $konfirmasi_pembayaran['no_rek'] ?>">  
              </div>
             
              <div class="form-group">
                <h5>Nominal Pembayaran</h5>
                <input type="text" name="nama_account" class="form-control" value="Rp.<?php echo number_format($konfirmasi_pembayaran['nominal_pembayaran']) ?>">
              </div>

              <div class="form-group">
                <h5>Status Pesanan</h5>
                <?php $a = $this->db->get_where('pesanan', ['pesanan_id'=>$konfirmasi_pembayaran['pesanan_id']])->row_array(); 
                ?>
                <select name="status" class="form-control">
                  <option  value="<?php echo $a['status']?>"><?php echo $a['status']?></option>
                  <option value="Lunas">Lunas</option>}
                  <option value="Sedang Dikirim">Sedang Dikirim</option>}
                  <option value="Menunggu Verifikasi Admin">Menunggu Verifikasi Admin</option>}
                </select>
              </div>
             
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary" >Verifikasi</button>
              </div>
            </form>
          </div>


          <div class="col-xl-4">
            <div class="form-group">
              <img src="<?php echo base_url('assets/images/'. $konfirmasi_pembayaran['foto_struk']) ?>" height="400" width="100%" alt="foto struk">
            </div>  
          </div>

          
         </div> 
        </div>  
    </div>  
  </div>
 
</div>
  