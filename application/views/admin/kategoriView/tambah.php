<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
	              <h3 class="box-title">Tambah Data Kategori Produk</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/kategori/tambah_aksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Nama Kategori</label>
	                  <input type="text" name="nama_kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email Pengguna">
	                  <?= form_error('nama_kategori', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Urutan</label>
	                  <input type="text" name="urutan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username Pengguna">
	                  <?= form_error('urutan', '<div class="text-danger small ml-3">','</div>') ;?>
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
