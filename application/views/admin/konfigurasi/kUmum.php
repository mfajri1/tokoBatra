<?php 
	// mencek apakah error
	if (isset($error)) {
		echo '<p class="alert alert-warning">';
		echo $error;
		echo '</p>';
	}
 ?>
 <section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tambah Data Konfigurasi</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/konfigurasi/ubahUmumAksi') ;?>" method="post" enctype="multipart/form-data">
	              	<div class="box-body">
	              		<div class="form-group">
	              			<input type="hidden" name="id_konfigurasi" class="form-control" id="nama_web" placeholder="Masukkan Nama Website" value="<?= $konfig['id_konfigurasi'] ;?>">
	              		</div>
	              		<div class="form-group">
	              			<label for="nama_web">Nama Website</label>
	              			<input type="text" name="nama_web" class="form-control" id="nama_web" placeholder="Masukkan Nama Website" value="<?= $konfig['nama_web'] ;?>">
	              			<?= form_error('nama_web', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="tagline">Tagline</label>
	              			<input type="text" name="tagline" class="form-control" id="tagline" placeholder="Masukkan Tagline" value="<?= $konfig['tagline'] ;?>">
	              			<?= form_error('tagline', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="email">Email</label>
	              			<input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" value="<?= $konfig['email'] ;?>">
	              			<?= form_error('tagline', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="website">Website</label>
	              			<input type="text" name="website" class="form-control" id="website" placeholder="Masukkan website" value="<?= $konfig['website'] ;?>">
	              			<?= form_error('website', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="keywords">Keyword</label>
	              			<input type="text" name="keywords" class="form-control" id="keywords" placeholder="Masukkan keywords" value="<?= $konfig['keywords'] ;?>">
	              			<?= form_error('keywords', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="metatext">Metatext</label>
	              			<input type="text" name="metatext" class="form-control" id="metatext" placeholder="Masukkan metatext" value="<?= $konfig['metatext'] ;?>">
	              			<?= form_error('metatext', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="telp">No. Telephone</label>
	              			<input type="text" name="telp" class="form-control" id="telp" placeholder="Masukkan No Telphone" value="<?= $konfig['telp'] ;?>">
	              			<?= form_error('telp', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="alamat">Alamat</label>
	              			<textarea name="alamat" class="form-control" placeholder="Masukkan Keterangan Produk"><?= $konfig['alamat'] ;?></textarea>
	              			<?= form_error('alamat', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="fb">Facebook</label>
	              			<input type="text" name="fb" class="form-control" id="fb" placeholder="Masukkan Nama Facebook" value="<?= $konfig['fb'] ;?>">
	              			<?= form_error('fb', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="instagram">Instagram</label>
	              			<input type="text" name="instagram" class="form-control" id="instagram" placeholder="Masukkan Nama Instagram" value="<?= $konfig['instagram'] ;?>">
	              			<?= form_error('instagram', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="wa">Whatsapp</label>
	              			<input type="text" name="wa" class="form-control" id="wa" placeholder="Masukkan Nama whatsapp" value="<?= $konfig['wa'] ;?>">
	              			<?= form_error('instagram', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="deskripsi">Deskripsi</label>
	              			<input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" value="<?= $konfig['deskripsi'] ;?>">
	              			<?= form_error('deskripsi', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="rekening_pembayaran">Rekening Pembayaran</label>
	              			<input type="text" name="rekening_pembayaran" class="form-control" id="rekening_pembayaran" placeholder="Masukkan rekening_pembayaran" value="<?= $konfig['rekening_pembayaran'] ;?>">
	              			<?= form_error('rekening_pembayaran', '<div class="text-danger small ml-3">','</div>') ;?>
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
