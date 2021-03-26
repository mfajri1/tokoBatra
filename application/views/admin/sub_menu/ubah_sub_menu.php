<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<form role="form" action="<?= base_url('admin/sub_menu/ubahSubMenuAksi/') . $sub_menu['id_sub_menu'];?>" method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>Nama Menu</label>
							<select class="form-control select2" name="access_id" data-placeholder="Pilih Nama Akses Level"
							style="width: 100%;">
							<option value=""><----Pilih Menu----></option>
								<?php foreach ($tampil_menu as $m): ?>
									<option value="<?= $m['id_access'] ;?>" <?php if ($sub_menu['access_id'] == $m['id_access']){ echo 'selected';}?>><?= ucfirst($m['access']) ;?></option>	
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="nama_menu">Nama Menu</label>
							<input type="hidden" name="id_sub_menu" class="form-control" id="id_sub_menu" value="<?= $sub_menu['id_sub_menu'] ;?>">

							<input type="text" name="title_menu" class="form-control" id="title_menu" value="<?= $sub_menu['title_menu'] ;?>">
							<?= form_error('title_menu', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
							<label for="link">Link Menu</label>
							<input type="text" name="link" class="form-control" id="link" value="<?= $sub_menu['link'] ;?>">
							<?= form_error('link', '<div class="text-danger small ml-3">','</div>') ;?>
						</div>
						<div class="form-group">
	                	<label>
	                		<input type="checkbox" name="menu_active" value="1" <?php if ($sub_menu['menu_active'] == 1){ echo 'checked'; }?>>
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
