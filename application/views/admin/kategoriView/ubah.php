<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?php echo validation_errors(); ?>
	            <form role="form" action="<?= base_url('admin/kategori/ubah_aksi/') .$kategori['id_kategori'] ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Nama Kategori</label>
	                  <input type="hidden" name="id_kategori" class="form-control" value="<?= $kategori['id_kategori'] ;?>">
	                  <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori'] ;?>" >
	                  <?= form_error('nama_kategori', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputEmail1">Urutan</label>
	                  <input type="text" name="urutan" class="form-control" value="<?= $kategori['urutan'] ;?>" >
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
