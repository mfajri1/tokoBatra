<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<?php echo validation_errors(); ?>
	            <form role="form" action="<?= base_url('admin/rekening/ubah_aksi/') .$rekening['id_rekening'] ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nama_bank">Nama Bank</label>
	                  <input type="hidden" name="id_rekening" class="form-control" value="<?= $rekening['id_rekening'] ;?>">
	                  <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="<?= $rekening['nama_bank'] ;?>" >
	                  <?= form_error('nama_bank', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="no_rekening">No Rekening</label>
	                  <input type="hidden" name="id_rekening" class="form-control" value="<?= $rekening['id_rekening'] ;?>">
	                  <input type="text" name="no_rekening" id="no_rekening" class="form-control" value="<?= $rekening['no_rekening'] ;?>" >
	                  <?= form_error('no_rekening', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="nama_pemilik">Nama Pemilik</label>
	                  <input type="hidden" name="id_rekening" class="form-control" value="<?= $rekening['id_rekening'] ;?>">
	                  <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" value="<?= $rekening['nama_pemilik'] ;?>" >
	                  <?= form_error('nama_pemilik', '<div class="text-danger small ml-3">','</div>') ;?>
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
