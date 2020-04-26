<h1 class="mt-4"><?php echo $title ?></h1>
  <?php echo $this->session->flashdata('pesan') ?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="<?php echo base_url('manage') ?>" title="">Manage</a></li>
    <li class="breadcrumb-item active"><?php echo $title ?></li>
</ol>
<div class="row">
  <div class="col-xl-6 mb-3">
	<h5>Data Admin</h5>
    <div class="card">
        <div class="card-body text-justfiy p-3">
          <div class="table-responsive">
          	<table id="myTable">
          		<thead>
          			<tr>
          				<th>Nama</th>
          				<th>Email</th>
          				<th>Aksi</th>
          			</tr>
          		</thead>
          		<tbody>
          			<?php foreach ($admins->result() as $c): ?>
          			<tr>
          				<td><?php echo $c->nama_admin ?></td>
          				<td><?php echo $c->email_admin ?></td>
          				<td class="float-left">
          					<a class="btn btn-sm btn-primary" href="<?php echo base_url('manage/data-admin/edit/'.$c->admin_id) ?>" title=""><i class="fas fa-pencil-alt"></i></a>
          					<a class="btn btn-sm btn-danger" href="<?php echo base_url('manage/data-admin/delete/'.$c->admin_id) ?>" title=""><i class="fas fa-trash"></i></a>
          					<a class="btn btn-sm btn-info" href="<?php echo base_url('manage/data-admin/read/'.$c->admin_id) ?>" title=""><i class="fas fa-eye"></i></a>
          				</td>
          			</tr>
          			<?php endforeach ?>
          		</tbody>
          	</table>
          </div>	
        </div>  
    </div>  
  </div>
  <div class="col-xl-6 mb-3">
  	<h5>Tambah Data Admin</h5>
  	<div class="card card-body">
  		<form action="<?php echo base_url('manage/data-admin/') ?>" method="post" accept-charset="utf-8">
  			<div class="form-group">
  				<label for="nama">Nama Admin</label>
  				<input type="text" name="nama_admin" placeholder="Masukan Nama Admin" class="form-control">
				<?php echo form_error('nama_admin', '<small class="text-danger">','</small>'); ?>
  			</div>
  			<div class="form-group">
  				<label for="alamat">Alamat</label>
  				<input type="text" name="alamat_admin" placeholder="Masukan Alamat Admin" class="form-control">
  			</div>
  			<div class="form-group">
  				<label for="notelp">No Telp / WA</label>
  				<input type="text" name="notelp_admin" placeholder="Masukan Telp / WA Admin" class="form-control">
  			</div>
  			<div class="form-group">
  				<label for="email">Email</label>
  				<input type="email" name="email_admin" placeholder="Masukan Email" class="form-control">
				<?php echo form_error('email_admin', '<small class="text-danger">','</small>'); ?>
  			</div>
  			<div class="form-group">
  				<label for="password">Password</label>
  				<input type="password" name="password" placeholder="Masukan Password" class="form-control">
  			</div>
  			<div class="form-group">
  				<button class="btn btn-sm btn-primary" type="submit">Tambah</button>
  			</div>
  		</form>
  	</div>		
  </div>	
</div>
  