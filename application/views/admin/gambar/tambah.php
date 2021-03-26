<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
	              <h3 class="box-title">Tambah Data Gambar Produk</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/gambar/tambah_aksi') ;?>" method="post" enctype="multipart/form-data">
	              	<div class="box-body">
		              	<div class="form-group">
			               <label>Nama Produk</label>
			               <select class="form-control select2" name="id_produk" data-placeholder="Pilih Nama Gambar"
			                        style="width: 100%;">
			                  <?php foreach ($produk as $p): ?>
			                  	<option value="<?= $p['id_produk'] ;?>" checked><?= $p['nama_produk'] ;?></option>
			                  <?php endforeach ?>
			                </select>
			            </div>
		                <div class="form-group">
		                  <label for="judul_gambar">Judul Gambar</label>
		                  <input type="text" name="judul_gambar" class="form-control" id="judul_gambar" placeholder="Masukkan Judul Gambar">
		                  <?= form_error('judul_gambar', '<div class="text-danger small ml-3">','</div>') ;?>
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
