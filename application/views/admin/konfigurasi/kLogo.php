<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?= $this->session->flashdata('pesan') ;?>
				<form role="form" action="<?= base_url('admin/konfigurasi/ubahLogoAksi') ;?>" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<input type="hidden" name="id_konfigurasi" class="form-control" value="<?= $konfig['id_konfigurasi'] ;?>">
						</div>
						<div class="form-group">
							<label for="nama_web">Nama Website</label>
							<input type="text" id="nama_web" name="nama_web" class="form-control" value="<?= $konfig['nama_web'] ;?>">
							<?= form_error('nama_web', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label for="logo">Gambar Logo</label>
								</div>
							</div>
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-sm-6">
									<img src="<?= base_url('assets/img/konfig/'). $konfig['logo'] ;?>" width="100" alt="Foto Tidak Ada">		
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<input type="file" name="logo" id="gambar">
									<p class="help-block">Masukkan Foto minimal 50 kb.</p>
									<?= form_error('foto', '<div class="text-danger small ml-3">','</div>') ;?>	
								</div>
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

