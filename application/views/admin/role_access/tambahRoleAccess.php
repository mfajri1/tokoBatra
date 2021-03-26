<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
	            <form role="form" action="<?= base_url('admin/role_access/tambahRoleAccessAksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="access">Nama Access</label>
	                  <input type="text" name="access" class="form-control" id="access" placeholder="Masukkan Nama Access">
	                  <?= form_error('access', '<div class="text-danger small ml-3">','</div>') ;?>
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
