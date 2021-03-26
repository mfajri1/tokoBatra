<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-primary">
				<div class="box-header with-border">
	              <h3 class="box-title">Tambah Data Kategori Produk</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/rekening/tambah_aksi') ;?>" method="post" enctype="multipart/form-data">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="nama_bank">Nama Bank</label>
	                  <input type="text" name="nama_bank" class="form-control" id="nama_bank" placeholder="Masukkan Nama Bank">
	                  <?= form_error('nama_bank', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="no_rekening">No Rekening</label>
	                  <input type="text" name="no_rekening" class="form-control" id="no_rekening" placeholder="Masukkan No Rekening">
	                  <?= form_error('no_rekening', '<div class="text-danger small ml-3">','</div>') ;?>
	                </div>
	                <div class="form-group">
	                  <label for="nama_pemilik">Nama Pemilik</label>
	                  <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukkan No Rekening">
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
