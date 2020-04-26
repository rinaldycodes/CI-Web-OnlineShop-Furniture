<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
  <h5>Data pesanan</h5>
    <div class="card">
        <div class="card-header">
          
        </div>  
        <div class="card-body text-justfiy p-3">
          <div class="table-responsive">
            <table id="myTable" class="table-hover table-bordered">
              <thead>
                <tr>
                  <th>No. Invoice</th>
                  <th>Nama Penerima</th>
                  <th>No Telp</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pesanan->result() as $c): ?>
                <tr>
                  <td><?php echo $c->pesanan_id ?></td>
                  <td><?php echo $c->nama_penerima ?></td>
                  <td><?php echo $c->notelp ?></td>
                  <td><?php echo $c->status ?></td>
                  <td class="pull-right">
                   <!--  <a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/verifikasi-pembayaran/edit/'.$c->pesanan_id) ?>" title=""><i class="fas fa-pencil-alt"></i></a> -->
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('manage/verifikasi-pembayaran/delete/'.$c->pesanan_id) ?>" title=""><i class="fas fa-trash"></i></a>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url('manage/verifikasi-pembayaran/read/'.$c->pesanan_id) ?>" title=""><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>  
        </div>  
    </div>  
  </div>
 
</div>
  