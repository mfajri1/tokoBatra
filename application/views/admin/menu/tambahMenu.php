<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
	            <form role="form" action="<?= base_url('admin/menu/tambahMenuAksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nama_menu">Nama Menu</label>
	                  <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Masukkan Nama Menu">
	                  <?= form_error('nama_menu', '<div class="text-danger small ml-3">','</div>') ;?>
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
