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
					<h3 class="box-title">Tambah Data Produk</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/produk/tambah_aksi') ;?>" method="post" enctype="multipart/form-data">
	              	<div class="box-body">
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Nama Produk</label>
	              			<input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Produk" value="<?= set_value('nama_produk') ;?>">
	              			<?= form_error('nama_produk', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Kode Produk</label>
	              			<input type="text" name="kode_produk" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kode Produk">
	              			<?= form_error('kode_produk', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label>Nama Kategori</label>
	              			<select class="form-control select2" name="id_kategori" data-placeholder="Pilih Nama Kategori"
	              			style="width: 100%;">
	              			<option value=""><----Pilih Nama Kategori Produk----></option>
	              				<?php foreach ($kategori as $k): ?>
	              					<option value="<?= $k['id_kategori'] ;?>" checked><?= $k['urutan'].'. '.ucfirst($k['nama_kategori']) ;?></option>
	              				<?php endforeach ?>
	              			</select>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Harga</label>
	              			<input type="number" min="0" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Harga Produk">
	              			<?= form_error('harga', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<div class="pull-right hidden-xs">
	              				<b class="text-xs">Buah</b>
	              			</div>
	              			<label for="exampleInputEmail1">Stok</label>
	              			<input type="number" min="0" name="stok" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Stok Kategori dalam Satuan Gram">
	              			<?= form_error('stok', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Berat</label>
	              			<div class="pull-right hidden-xs text-xs">
	              				<b class="text-xs">Gram</b>
	              			</div>
	              			<input type="number" name="berat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Berat Produk Dalam Satuan Gram">
	              			<?= form_error('berat', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<div class="pull-right hidden-xs">
	              				<b class="text-xs">CM</b>
	              			</div>
	              			<label for="exampleInputEmail1">Ukuran</label>
	              			<input type="text" name="ukuran" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Ukuran Produk Dalam Satuan CM">
	              			<?= form_error('ukuran', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Keterangan Produk</label>
	              			<textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan Produk"></textarea>
	              			<!-- id="editor" -->
	              			<?= form_error('keterangan', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Keywords</label>
	              			<textarea name="keywords" class="form-control" placeholder="Masukkan Keywords"></textarea>
	              			<?= form_error('keywords', '<div class="text-danger small ml-3">','</div>') ;?>
	              		</div>
	              		<div class="form-group">
	              			<div class="row">
	              				<div class="col-sm-6">
	              					<label for="exampleInputFile">Masukkan Foto</label>
	              				</div>
	              			</div>
	              			<div class="row">
	              				<div class="col-sm-6">
	              					<input type="file" name="gambar" id="exampleInputFile">
	              					<p class="help-block">Masukkan Foto minimal 50 kb.</p>
	              				</div>
	              			</div>
	              		</div>
	              		<div class="form-group">
	              			<label for="exampleInputEmail1">Status Produk</label>
	              			<select class="form-control select2" name="status_produk" data-placeholder="Pilih Status Produk"
	              			style="width: 100%;">
	              			<option value="publish">Publikasikan</option>
	              			<option value="draft">Simpan Sebagai Draft</option>
	              		</select>
	              		<?= form_error('status_produk', '<div class="text-danger small ml-3">','</div>') ;?>
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
