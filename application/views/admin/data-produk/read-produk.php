<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage/data-produk') ?>" title="">Data produk</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
    <div class="card">
        <div class="card-body text-justfiy p-3">
          <div class="row">
            <div class="col-xl-6 col-sm-6">
              <img src="<?php echo base_url('assets/images/'.$produk['foto']) ?>" alt="" width="100%" height="360">
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="form-group bg-light px-3 py-2">
                  <div class="row">
                    <div class="col-xl-8">
                      <strong for="">Produk</strong>
                      <p><?php echo $produk['nama_produk'] ?></p>
                    </div>
                    <div class="col-xl-4">
                      <strong for="">Kategori</strong>
                      <p>
                        <!-- UNTUK MENAMPILKAN KATEGORI MAKA 
                          DILAKUKAN PANGGILAN KATEGORI BERDASARKAN KATEGORI ID -->
                        <?php echo ucfirst($kategori['kategori']) ?>
                      </p>
                    </div>
                  </div>  
                </div>

                <div class="form-group bg-light px-3 py-2">
                  <strong for="">Keterangan Produk</strong>
                  <p><?php echo $produk['keterangan_produk'] ?></p>
                </div>

                <div class="form-group bg-light px-3 py-2">
                  <div class="row">
                    <div class="col-4">
                      <strong for="">Berat</strong>
                      <p><?php echo $produk['berat'] ?></p>
                    </div>
                    <div class="col-4">
                      <strong for="">Stok</strong>
                      <p><?php echo $produk['stok'] ?></p>
                    </div>
                    <div class="col-4">
                      <strong for="">Status</strong>
                      <p><?php echo $produk['status'] ?></p>
                    </div>
                  </div>  
                </div>
                <div class="form-group px-3 py-2">
                  <div class="row">
                    <div class="col-xl-6 mb-2">
                      <a class="btn btn-sm btn-info form-control px-3" href="<?php echo base_url('produk') ?>" title=""><i class="fas fa-search"></i> BROWSE PRODUK</a>
                    </div>
                    <div class="col-xl-6">
                      <a class="btn btn-primary btn-sm form-control px-3" href="<?php echo base_url('tambah-foto/'.$produk['slug_produk']) ?>" title=""><i class="fas fa-plus"></i> FOTO PRODUK</a>
                    </div>
                  </div>
                  
                </div>
            </div>
          </div>  <!-- row2 -->
          
        </div>  <!-- card body -->
    </div>  
  </div>
</div>
  