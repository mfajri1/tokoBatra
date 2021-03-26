<?php 
	// mencek apakah error
	if (isset($error)) {
		echo '<p class="alert alert-warning">';
		echo $error;
		echo '</p>';
	}
 ?>
<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<?= $this->session->flashdata('pesan') ;?>
			<div class="box box-primary">
				<div class="box-header with-border">
	              <h3 class="box-title">Tambah Data Gambar Produk</h3>
	            </div>
	            <form role="form" action="<?= base_url('admin/produk/aksiGambar/') . $produk['id_produk'];?>" method="post" enctype="multipart/form-data">
	              	<div class="box-body">
		                <div class="form-group">
		                  <label for="judul_gambar">Judul Gambar</label>
		                  <input type="text" name="judul_gambar" class="form-control" id="judul_gambar" placeholder="Masukkan Judul Gambar">
		                  <?= form_error('judul_gambar', '<div class="text-danger small ml-3">','</div>') ;?>
		                </div>
		                <div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label for="exampleInputFile">Masukkan Foto Gambar</label>
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
		<div class="col-sm-12">
			<table id="example1" class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>No</th>
						<th>Gambar</th>
						<th>Judul Gambar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?= 1 ;?></td>
						<td><img src="<?= base_url('/assets/img/produk/') . $produk['gambar'] ;?>" class="img-responsive img-thumbnail" width="100"></td>
						<td><?= $produk['nama_produk'] ;?></td>
						<td></td>
					</tr>
					<?php $i = 2 ;?>
					<?php foreach ($gambar as $g): ?>
						<tr>
							<td><?= $i++ ;?></td>
							<td><img src="<?= base_url('/assets/img/produk/') . $g['gambar'] ;?>" class="img-responsive img-thumbnail" width="100"></td>
							<td><?= ucfirst($g['judul_gambar']) ;?></td>
							<td>
								<a href="<?= base_url('admin/produk/hapus_gambar/') . $produk['id_produk'] . '/' . $g['id_gambar'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	
</section>
