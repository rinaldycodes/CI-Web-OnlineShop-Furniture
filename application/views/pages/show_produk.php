<div class="container">
    
<!--   <h1 class="mt-4"><?php echo $title ?></h1> -->

  <div class="row">
    <div class="col-xl-12 mb-3 my-5">
      <div class="card">
          <div class="card-body text-justfiy p-3">
            <div class="row">
              <div class="col-xl-6 col-sm-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block" height="450" width="100%" src="<?php echo base_url('assets/images/'.$produk['foto']) ?>" alt="First slide">
                    </div>
                    <?php foreach ($foto as $c): ?>
                      
                      <div class="carousel-item">
                          <img class="d-block" height="450" width="100%" src="<?php echo base_url('assets/images/'.$c['foto']) ?>" alt="First slide">
                      </div>
                    <?php endforeach ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
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
                        <p><?php echo $produk['berat'] ?> kg</p>
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
                    <div class="produk-item">
                        <a class="btn btn-sm btn-warning text-white form-control" style="font-weight: 700; font-size: 16px; letter-spacing: 2px" href="<?php echo base_url('tambah-keranjang/'.$produk['produk_id']) ?>" title="">Add to Cart
                        </a>
                    </div>
                  </div>
              </div>
            </div>  <!-- row2 -->
            
          </div>  <!-- card body -->
      </div>  
    </div>
  </div>

</div>

  