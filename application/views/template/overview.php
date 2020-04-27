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

    <!-- KONTAK -->
    <section id="kontak" class="bg-dark py-1">
      <div class="container text-white">
        <table cellpadding="6">
          <tbody>
            <tr class="text-center">
              <td><i class="fa fa-envelope-o"></i> furnitureshop.pro@gmail.com</td>
              <td><i class="fa fa-phone"></i> 021-1397-9180</td>
              <td><i class="fa fa-map-marker"></i> Jl. Patriot, Bekasi Utara No. 45</td>
              <td>
                 <form action="<?= base_url('cari') ?>" method="post">
                  <div class="row">
                    <div class="col-8">
                      <input type="text" name="cari" class="form-control">
                    </div>
                    <div class="col-4">
                      <button class="btn btn-primary form-control">Cari</button>
                    </div>
                  </div>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
    <!-- /KONTAK -->


    <!-- NAVBAR -->
      <?php $this->load->view('/template/_partials/navbar') ?>
    <!-- /NAVBAR -->


    <!-- NOTIF -->
    <!-- /NOTIF -->


    <!-- PAGE KONTEN -->
      <?php $this->load->view($page) ?>
    <!-- /PAGE KONTEN -->


    <!-- SIDE KONTEN -->
     <!--  </div> -->  <!-- container tembusan dari $page -->
   <!--  </section> --> <!-- section tembusan dari $page -->
    <!-- /SIDE KONTEN -->


    <!-- FOOTER KONTEN -->
      <?php $this->load->view('template/_partials/footer') ?>
    <!-- /FOOTER KONTEN -->

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

   
    
    
  </body>
</html>