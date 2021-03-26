 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-header">
 					<h3 class="box-title">Tabel Kategori Produk</h3>
 				</div>
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<a href="<?= base_url('admin/produk/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Produk</a><br><br>
 					<table id="example1" class="table table-bordered table-sm">
 						<thead>
 							<tr>
 								<th>No</th>
 								<th>Gambar</th>
 								<th>Nama</th>
 								<th>Kategori</th>
 								<th>Harga</th>
 								<th>Status</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i = 1 ;?>
 							<?php foreach ($produk as $p) : ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><img src="<?= base_url('/assets/img/produk/thumbs/') . $p['gambar'] ;?>" class="img-responsive img-thumbnail" width="100"></td>
 									<td><?= ucfirst($p['nama_produk']) ;?></td>
 									<td><?= ucfirst($p['nama_kategori']) ;?></td>
 									<td><?= number_format($p['harga'],2,',','.') ;?></td>
 									<td><?= ucfirst($p['status_produk']) ;?></td>
 									<td>
 										<a href="<?= base_url('admin/produk/tampil/') . $p['id_produk'];?>" class="btn btn-success btn-xs"><i class="fa fa-info"></i></a>
 										<a href="<?= base_url('admin/produk/ubah/') . $p['id_produk'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 										<a href="<?= base_url('admin/produk/hapus/') . $p['id_produk'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
 										<a href="<?= base_url('admin/produk/addGambar/') . $p['id_produk'];?>" class="btn btn-warning btn-xs"><i class="fa fa-plus"></i><?= "  " . $p['total_gambar'] ;?> IMG</a>
 									</td>
 								</tr>
 							<?php endforeach ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>