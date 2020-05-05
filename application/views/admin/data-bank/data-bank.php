<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-12 mb-3">
  <h5>Data bank</h5>
    <div class="card">
        <div class="card-header">
          <a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/data-bank/tambah') ?>" title=""><i class="fas fa-plus"></i> Tambah</a>
        </div>  
        <div class="card-body text-justfiy p-3">
          <div class="table-responsive">
            <table id="myTable" class="table-hover table-bordered">
              <thead>
                <tr>
                  <th>ID bank</th>
                  <th>bank</th>
                  <th>No. Rek</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($bank->result() as $c): ?>
                <tr>
                  <td><?php echo $c->payment_id ?></td>
                  <td><?php echo $c->payment ?></td>
                  <td><?php echo $c->no_rek ?></td>
                  <td class="pull-right">
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/data-bank/edit/'.$c->payment_id) ?>" title=""><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-sm btn-danger" href="<?php echo base_url('manage/data-bank/delete/'.$c->payment_id) ?>" title=""><i class="fas fa-trash"></i></a>
                    <!-- <a class="btn btn-sm btn-info" href="<?php echo base_url('manage/data-bank/read/'.$c->payment_id) ?>" title=""><i class="fas fa-eye"></i></a> -->
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
  