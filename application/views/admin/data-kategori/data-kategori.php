<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-6 mb-3">
	<h5>Data Kategori</h5>
    <div class="card">
        <div class="card-header">
          <a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/data-kategori/tambah') ?>" title=""><i class="fas fa-plus"></i> Tambah</a>
        </div>  
        <div class="card-body text-justfiy p-3">
          <div class="table-responsive">
          	<table id="myTable" class="table-hover table-bordered">
          		<thead>
          			<tr>
          				<th>Kategori</th>
          				<th>Aksi</th>
          			</tr>
          		</thead>
          		<tbody>
          			<?php foreach ($kategori->result() as $c): ?>
          			<tr>
          				<td>
                    <form action="<?php echo base_url('update/kategori/'.$c->kategori_id) ?>" method="post">
                      <input type="text" name="kategori" value="<?php echo ucfirst($c->kategori) ?>">
                      <button type="submit">UPDATE</button>
                    </form>
                  </td>
          				<td class="text-center pull-right">
          				<!-- 	<a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/data-kategori/edit/'.$c->kategori_id) ?>" title=""><i class="fas fa-pencil-alt"></i></a> -->
          					<a class="btn btn-sm btn-danger" href="<?php echo base_url('manage/data-kategori/delete/'.$c->kategori_id) ?>" title=""><i class="fas fa-trash"></i></a>
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
  