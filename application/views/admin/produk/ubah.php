<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?= $this->session->flashdata('pesan') ;?>
				<form role="form" action="<?= base_url('admin/produk/ubah_aksi/') .$produk['id_produk'] ;?>" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<input type="hidden" name="id_produk" class="form-control" value="<?= $produk['id_produk'] ;?>">
							<input type="hidden" name="id_user" class="form-control" value="<?= $produk['id_user'] ;?>">
							<input type="hidden" name="id_kategori" class="form-control" value="<?= $produk['nama_kategori'] ;?>">
							<input type="hidden" name="tanggal_post" value="<?= $produk['tanggal_post'] ;?>" class="form-control">
						</div>
						<div class="form-group">
							<label for="nama_produk">Nama Produk</label>
							<input type="text" id="nama_produk" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ;?>">
							<?= form_error('nama_produk', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="kode_produk">Kode Produk</label>
							<input type="text" id="kode_produk" name="kode_produk" class="form-control" value="<?= $produk['kode_produk'] ;?>">
							<?= form_error('kode_produk', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label>Nama Kategori</label>
							<select class="form-control select2" name="id_kategori" data-placeholder="Pilih Nama Kategori"
							style="width: 100%;">
								<?php foreach ($kategori as $k): ?>
									<option value="<?= $k['id_kategori'] ;?>" <?php if ($produk['id_kategori'] == $k['id_kategori']) {
										echo 'selected';
									} ?>>
									<?= $k['urutan'] . '. ' . ucfirst($k['nama_kategori']) ;?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<input type="number" id="harga" name="harga" class="form-control" value="<?= $produk['harga'] ;?>">
							<?= form_error('harga', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="pull-right hidden-xs">
	              				<b class="text-xs">Buah</b>
	              			</div>
							<label for="stok">Stok</label>
							<input type="number" id="stok" name="stok" class="form-control" value="<?= $produk['stok'] ;?>">
							<?= form_error('stok', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="pull-right hidden-xs">
	              				<b class="text-xs">Gram</b>
	              			</div>
							<label for="berat">Berat</label>
							<input type="number" id="berat" name="berat" class="form-control" value="<?= $produk['berat'] ;?>">
							<?= form_error('berat', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="pull-right hidden-xs">
	              				<b class="text-xs">CM</b>
	              			</div>
							<label for="ukuran">Ukuran</label>
							<input type="text" id="ukuran" name="ukuran" class="form-control" value="<?= $produk['ukuran'] ;?>">
							<?= form_error('ukuran', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<textarea id="keterangan" name="keterangan" class="form-control"><?= $produk['keterangan'] ;?></textarea> 
							<?= form_error('keterangan', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="keywords">Keywords</label>
							<textarea id="keywords" name="keywords" class="form-control"><?= $produk['keywords'] ;?></textarea> 
							<?= form_error('keywords', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label for="Gambar">Gambar Produk</label>
								</div>
							</div>
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-sm-6">
									<img src="<?= base_url('assets/img/produk/'). $produk['gambar'] ;?>" width="100">		
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<input type="file" name="gambar" id="gambar">
									<p class="help-block">Masukkan Foto minimal 50 kb.</p>
									<?= form_error('foto', '<div class="text-danger small ml-3">','</div>') ;?>	
								</div>
							</div>
						</div>
						<div class="form-group">
		                  	<label for="exampleInputEmail1">Status Produk</label>
		 	                 <select class="form-control select2" name="status_produk" data-placeholder="Pilih Status Produk"
			                        style="width: 100%;">
			                  	<option value="publish">Publikasikan</option>
			                  	<option value="draft" <?php if ($produk['status_produk'] == 'draft') { echo 'selected';} ?>>Simpan Sebagai Draft</option>
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

