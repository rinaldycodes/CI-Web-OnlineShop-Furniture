<h1 class="mt-4">Cek No. Invoice</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>" title="">Dashboard</a></li>
    <li class="breadcrumb-item active">Cek No. Invoice</li>
</ol>
<?php echo $this->session->userdata('pesan') ?>
<div class="row">
  <div class="col-xl-12">

    <!-- MASUKAN NO INVOICE -->
      <div class="card mb-3">
          <div class="card-body p-5">
            <form action="<?php echo base_url('konfirmasi-pembayaran/cek-invoice') ?>" method="post" accept-charset="utf-8">
              <div class="form-group row justify-content-center">
                <div class="col-xl-7">
                  <h5>Masukan No. Invoice</h5>
                  <input type="text" name="pesanan_id" class="form-control">
                  <input type="submit" value="Cek No Invoice" class="btn btn-sm btn-primary form-control mt-3">
                </div>
              </div>
            </form>
          </div>    
      </div> 

   
  </div>
</div>
  