<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<?= $this->session->flashdata('pesan') ;?>
	<div class="flex-h flex-sb">
		<div class="w-size10 p-t-30 respon5 m-l-100 m-t-50">
			<img src="<?= base_url('assets/img/myprofile/') . $profile['foto'] ;?>" alt="<?= $profile['nama'] ;?>" width="150" height="150" class="rounded-circle">
		</div>
		<!-- form -->
		<form action="<?= base_url('member/member/aksiEditProfile') ;?>" method="post" enctype="multipart/form-data" class="form-horizontal w-size20 p-t-30 respon5">
			<div class="box-body">
				<div class="form-group row">
					<?= form_hidden('id_user', $profile['id_user']); ?>
					<?= form_hidden('active', $profile['active']); ?>
					<?= form_hidden('password', $profile['password']); ?>
					<?= form_hidden('tanggal_daftar', $profile['tanggal_daftar']); ?>
					<?= form_hidden('akses_level', $profile['akses_level']); ?>
					<label for="nama" class="col-sm-2 control-label">Nama</label>
					<div class="col-sm-10">
						
						<input type="text" name="nama" id="nama" class="form-control" value="<?= $profile['nama'] ;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="email" id="email" class="form-control" value="<?= $profile['email'] ;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" name="username" id="emali" class="form-control" value="<?= $profile['username'] ;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="alamat" class="col-sm-2 control-label">alamat</label>
					<div class="col-sm-10">
						<input type="text" name="alamat" id="emali" class="form-control" value="<?= $profile['alamat'] ;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="telp" class="col-sm-2 control-label">Telphone</label>
					<div class="col-sm-10">
						<input type="text" name="telp" id="emali" class="form-control" value="<?= $profile['telp'] ;?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="telp" class="col-sm-2 control-label">Foto</label>
					<div class="col-sm-10">
						<input type="file" name="foto" id="foto" class="form-control">
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-info pull-left ">Proses</button>
			</div>
			<!-- /.box-footer -->	
		</form>
	</div>
</div>
