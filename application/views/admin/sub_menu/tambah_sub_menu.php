<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
	            <form role="form" action="<?= base_url('admin/sub_menu/tambahSubMenuAksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                	<label>Role</label>
	                	<select class="form-control select2" name="access_id" data-placeholder="Pilih Nama Akses Level"
	                	style="width: 100%;">
	                	<option value=""><----Pilih Role----></option>
	                		<?php foreach ($role as $r): ?>
	                			<option value="<?= $r['id_access'] ;?>"><?= ucfirst($r['access']) ;?></option>	
	                		<?php endforeach ?>
	                	</select>
	                </div>
	                <div class="form-group">
	                  <label for="title_menu">Nama Menu</label>
	                  <input type="text" name="title_menu" class="form-control" id="title_menu" placeholder="Masukkan Nama Menu">
	                  <?= form_error('title_menu', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="link">Link Menu</label>
	                  <input type="text" name="link" class="form-control" id="link" placeholder="Masukkan Username Pengguna">
	                  <?= form_error('link', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                	<label>
	                		<input type="checkbox" name="menu_active" id="menu_Active" value="1" checked>
	                		Active
	                	</label>
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
