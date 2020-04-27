<h1 class="mt-4">Pesanan <?php  echo $isLogin['nama'] ?></h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Pesanan</li>
</ol>
<div class="row">
  <div class="col-xl-12">
      <div class="card">
          <div class="card-body">
            <?php if (!empty($pesanan)): ?>
              <div class="table-responsive">
                <table id="myTable" class="table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Nama Penerima</th>
                      <th>No. Invoice</th>
                      <th>Tgl Pesan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($pesanan as $c): ?>
                    <tr>
                      <td><?php echo $c['nama_penerima'] ?></td>
                      <td><?php echo $c['pesanan_id'] ?></td>
                      <td><?php echo $c['tgl_pesan'] ?></td>
                      <td><?php echo $c['status'] ?></td>
                      <td class="pull-right">
                        <a class="btn btn-sm btn-info" href="<?php echo base_url('pesanan/'.$c['pesanan_id']) ?>" title=""><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>  
            <?php else: ?>
              <h6 class="text-center">Anda belum melakukan pesanan apapun</h6> <br>
              <div class="text-center">
              <a class="text-center p-3 btn btn-primary btn-sm" href="<?php echo base_url('produk')?>" title="produk">BROWSE PRODUK</a>
              </div>
            <?php endif; ?>
          </div>    
      </div>    
  </div>
</div>
