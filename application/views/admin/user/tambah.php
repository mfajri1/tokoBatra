<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
	              <h3 class="box-title">Tambah Data Pengguna</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/user/tambah_aksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Nama Pengguna</label>
	                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Pengguna">
	                  <?= form_error('nama', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Email</label>
	                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email Pengguna">
	                  <?= form_error('email', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Username</label>
	                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username Pengguna">
	                  <?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Password</label>
	                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password Pengguna">
	                  <?= form_error('password', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Re-Password</label>
	                  <input type="password" name="password2" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Ulang Password">
	                  <?= form_error('nama_matakuliah', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
	              </div>
	            </form>
			</div>
		</div>
	</div>
</section>
