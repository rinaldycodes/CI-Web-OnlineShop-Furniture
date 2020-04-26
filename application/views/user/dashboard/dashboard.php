<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
  <div class="col-xl-12">
      <div class="card">
          <div class="card-body">
             <h2><?php echo $isLogin['nama'] ?></h2>
             <hr>
             <div class="form-group">
                <label for="">Alamat:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['alamat'] ?></p>
                </blockquote>
             </div>
             <div class="form-group">
                <label for="">Telp / WA:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['notelp'] ?></p>
                </blockquote>
             </div>
             <div class="form-group">
                <label for="">Email:</label>
                <blockquote class="form-control" cite="http://example.com/facts">
                    <p><?php echo $isLogin['email'] ?></p>
                </blockquote>
             </div>
          </div>    
      </div>    
  </div>
</div>
  