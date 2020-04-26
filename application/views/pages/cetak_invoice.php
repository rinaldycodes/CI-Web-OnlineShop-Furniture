<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/bootstrap.min.css') ?>" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- MY CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/css/style.css') ?>">    

    <title><?php echo $title ?> - <?php echo NAMA_WEB ?></title>
  </head>
  <body>
    


    <!-- NOTIF -->
    <!-- /NOTIF -->


    <!-- PAGE KONTEN -->
      <div class="container bg-light p-5 my-5">
        <h3 class="text-center">Invoice</h3>
        <hr>
        <div class="row"> <!-- row1 -->
          <!-- <div class="col-xl-3">
            
          </div> -->


          <div class="col-xl-8">
            <div class="my-3">
              <h6>Detail Pembayaran</h6>
              <ul>
                <?php foreach ($invoice as $c): ?>
                <?php endforeach ?>
                <?php  $payment = $this->db->get_where('payment', ['payment_id'=>$c['payment_id']])->row_array(); ?>
                  <li>Payment: <?php echo $payment['payment'] ?> </li>
                <li>Nama Pemilik: Rio</li>
                <li>No. Rek: XXXXXXXXXXX</li>
              </ul>
            </div>
            <div class="my-3">
              <h6>Detail Pesanan</h6>
              <div class="row">
                <div class="col-8">
                  <strong>PRODUK</strong>
                      <hr>
                        <p>
                        <?php foreach ($invoice as $c): ?>
                          <?php echo $c['nama_produk'] ?>
                          <small>x
                          <strong><?php echo $c['quantity'] ?></strong>
                          </small> <br>
                          Berat <?php echo $c['berat'] ?>kg x Rp.10.000 x <?php echo $c['quantity'] ?> <br>
                          <hr>
                          
                        <?php endforeach ?>
                          Ongkir - JP <?php echo $c['jasa_pengiriman'] ?> - <?php echo $c['kota'] ?>
                        </p>
                </div>


                <div class="col-4 text-right">
                  <strong>SUB-TOTAL</strong>
                    <hr>
                      <p class="text-right" style="height: 50px">
                        <?php foreach ($invoice as $c): ?>
                          <strong>Rp.<?php echo number_format($c['harga_total'],0,'.','.') ?></strong> 
                          <br>
                          <!-- <strong>Rp.<?php echo number_format($c['quantity']*10000*$c['berat'],0,'.','.') ?></strong> --> 
                          <br>
                          <hr>
                        <?php endforeach ?>
                          <p class="text-right"><strong>Rp.<?php echo number_format($c['tarif'],0,'.','.') ?></strong></p> 
                      </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-6">
                  <h5>Total</h5>
                </div>  
                <div class="col-6 text-right">
                  <strong>Rp.<?php echo number_format($this->Pesanan_model->total_harga()+$c['tarif'],0,'.','.') ?></strong>
                </div>
              </div>
            </div>
          </div>


          <div class="col-xl-4">
            <div class="my-3">
              <div class="card card-body">
                <h6>Terima Kasih.</h6>
                <ul>
                  <?php $pesanan  = $this->db->get_where('pesanan', ['pesanan_id'=>$this->session->userdata('pesanan_id')])->row_array(); ?>
                  <li>No. Invoice: <strong><?php echo $pesanan['pesanan_id'] ?></strong></li>
                  <li>Tanggal Pesan: <strong><?php echo tanggal($pesanan['tgl_pesan']) ?></strong></li>
                </ul>
              </div>
            </div>
            <div class="my-3">
              <a class="form-control btn btn-sm btn-primary" href="<?php echo base_url('cetak-invoice') ?>" title="Cetak Invoice" rel="no follow" target="_blank">Cetak</a>
            </div>
            <div class="my-3 alert alert-info">
              <small>
                Lakukan pembayaran langsung ke rekening bank kami. Silahkan gunakan No. Invoice Anda sebagai referensi pembayaran. <br> Pesanan Anda tidak akan dikirim sampai dana telah Kami terima. Lalu lakukan konfirmasi pembayaran
              </small>        
            </div>    
          </div>

        </div><!-- /row1  -->
      </div>    
    <!-- /PAGE KONTEN -->


    <!-- SIDE KONTEN -->
     <!--  </div> -->  <!-- container tembusan dari $page -->
   <!--  </section> --> <!-- section tembusan dari $page -->
    <!-- /SIDE KONTEN -->


 

    <section id="copyright" class="bg-secondary text-white py-3">
      <div class="container">
        <div class="row">
          <div class="col-xl-6">
            Copyright <?php echo NAMA_WEB .' @ '. date('Y')?> 
          </div>
          <div class="col-xl-6">
            
          </div>
        </div>  
      </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js') ?>/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js') ?>/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js') ?>/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      window.print();
    </script>

   
    
    
  </body>
</html>