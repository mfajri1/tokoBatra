<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?= $this->session->flashdata('pesan') ;?>
				<form role="form" action="<?= base_url('admin/user/ubah_aksi/') .$user['id_user'] ;?>" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Pengguna</label>
							<input type="hidden" name="id_user" class="form-control" value="<?= $user['id_user'] ;?>">
							<input type="hidden" name="password" class="form-control" value="<?= $user['password'] ;?>">
							<input type="hidden" name="active" class="form-control" value="<?= $user['active'] ;?>">
							<input type="hidden" name="tanggal_daftar" class="form-control" value="<?= $user['tanggal_daftar'] ;?>">

							<input type="text" name="nama" class="form-control" value="<?= $user['nama'] ;?>">
							<?= form_error('nama', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" name="email" class="form-control" value="<?= $user['email'] ;?>" readonly>
							<?= form_error('email', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" class="form-control" value="<?= $user['username'] ;?>" readonly>
							<?= form_error('username', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" name="alamat" class="form-control" value="<?= $user['alamat'] ;?>">
							<?= form_error('alamat', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="telp">Telephone</label>
							<input type="text" name="telp" class="form-control" value="<?= $user['telp'] ;?>">
							<?= form_error('telp', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<!-- /.form-group -->
						<div class="form-group">
							<label>Akses Level</label>
							<select name="akses_level" class="form-control select2" style="width: 100%;">
								<option value=""><-- Masukkan Level User --></option>
								<?php foreach ($role as $r): ?>
									<option value="<?= $r['id_access'] ;?>" <?php if ($user['akses_level'] == $r['id_access']) { echo 'selected'; } ?>><?= ucfirst($r['access']) ;?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('akses_level', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="exampleInputFile">Masukkan Foto</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<img src="<?= base_url('assets/img/myprofile/') .$user['foto'] ;?>" alt="" width="100">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-sm-6">
									<input type="file" name="foto" id="exampleInputFile" value="<?= $user['foto'] ;?>">
									<p class="help-block">Masukkan Foto minimal 50 kb.</p>
									<?= form_error('foto', '<div class="text-danger small ml-3">','</div>') ;?>	
								</div>
							</div>
						</div>
						<div class="form-group">
			                <div class="checkbox">
	                      		<label>
	                        		<input type="checkbox"> Active?
	                      		</label>
			                </div>
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
