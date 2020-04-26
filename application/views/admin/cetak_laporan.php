<!DOCTYPE HTML>
<html lang="en">
     <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title.' - '.NAMA_WEB ?></title>
        <link href="<?= base_url('assets/library/sb/') ?>css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css') ?>/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <script src="<?php echo base_url('assets/js') ?>/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/css') ?>/style.css" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    </head>
  <body>
    


    <!-- NOTIF -->
    <!-- /NOTIF -->


    <!-- PAGE KONTEN -->
    <div class="container">
      <h1 class="mt-4"><?php echo $title ?></h1>
        

        <div class="row">
          <div class="col-xl-12 mb-3">
          <h5>Data Pesanan</h5>
            <div class="card">
                <div class="card-header bg-warning">
                  
                </div>  
                <div class="card-body text-justfiy p-3">
                  <div class="table-responsive">
                    <table  class="table table-xl table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No. Invoice</th>
                          <th>Nama Penerima</th>
                          <th>No Telp</th>
                          <th>Alamat</th>
                          <th>Tgl Pesan</th>
                          <th>Status</th>
                          <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($cetak->result() as $c): ?>
                        <tr>
                          <td><?php echo $c->pesanan_id ?></td>
                          <td><?php echo $c->nama_penerima ?></td>
                          <td><?php echo $c->notelp ?></td>
                          <td><?php echo $c->alamat ?></td>
                          <td><?php echo tanggal($c->tgl_pesan) ?></td>
                          <td><?php echo $c->status ?></td>
                          <td>Rp.<?php  $harga = $this->Pesanan_model->total_harga($c->pesanan_id);
                          echo number_format($harga) ?></td>
                        </tr>
                        <?php endforeach ?>
                        <tr>
                          <td colspan="6">Total Harga</td>
                          <td>Rp.<?php echo number_format($total_harga) ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>  
                </div>  
            </div>  
          </div>
         
        </div>
      
    </div>
              
    <!-- /PAGE KONTEN -->


   



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/js') ?>/jquery.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/js') ?>/bootstrap.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
        <script src="<?= base_url('assets/library/sb/') ?>js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8" async defer></script>

        <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        </script>

        <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

        <script>
                CKEDITOR.replace( 'editor1' );
        </script>


        <!-- print pdf -->
        <script type="text/javascript">
          window.print();
        </script>
    
    
  </body>
</html>