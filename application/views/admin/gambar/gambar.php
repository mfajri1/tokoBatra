 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-header">
 					<h3 class="box-title">Tabel Gambar Produk</h3>
 				</div>
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<a href="<?= base_url('admin/gambar/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data gambar Produk</a><br><br>
 					<table id="example1" class="table table-bordered table-sm">
 						<thead>
 							<tr>
 								<th>Id</th>
 								<th>Nama Produk</th>
 								<th>Judul Gambar</th>
 								<th>Gambar</th>
 								<th>Tanggal Update</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i=1; ?>
 							<?php foreach ($gambar as $g): ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><?= ucfirst($g['nama_produk']) ;?></td>
 									<td><?= ucfirst($g['judul_gambar']) ;?></td>
 									<td class="text-center">
 										<img src="<?= base_url('assets/img/produk/') . $g['gambar'] ;?>" width="50"></td>
 									<td><?= date('d-m-Y, H:i:s', $g['tanggal_update']) ;?></td>
 									<td>
 										<a href="<?= base_url('admin/gambar/ubah/') . $g['id_gambar'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 										<a href="<?= base_url('admin/gambar/hapus/') . $g['id_gambar'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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