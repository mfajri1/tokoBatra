 <section class="content">
	 	<div class="row">
	 		<div class="col-xl-12">
	 			<div class="box">
	 				<div class="box-header">
			           <h3 class="box-title">Tabel Kategori Produk</h3>
			         </div>
			         <div class="box-body">
			         	<?= $this->session->flashdata('pesan') ;?>
			         	<a href="<?= base_url('admin/kategori/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Kategori Produk</a><br><br>
			         	<table id="example1" class="table table-bordered table-sm">
			         		<thead>
			         			<tr>
			         				<th>Id Kategori</th>
			         				<th>Slug Kategori</th>
			         				<th>Nama Kategori</th>
			         				<th>Urutan</th>
			         				<th>Tanggal Update</th>
			         				<th>Aksi</th>
			         			</tr>
			         		</thead>
			         		<tbody>
			         			<?php $i=1; ?>
			         			<?php foreach ($kategori as $k): ?>
			         				<tr>
			         					<td><?= $i++ ;?></td>
			         					<td><?= ucfirst($k['slug_kategori']) ;?></td>
			         					<td><?= ucfirst($k['nama_kategori']) ;?></td>
			         					<td><?= $k['urutan'] ;?></td>
			         					<td><?= date('d-m-Y, H:i:s', $k['tanggal_update']) ;?></td>
			         					<td>
			         						<a href="<?= base_url('admin/kategori/ubah/') . $k['id_kategori'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
			         						<a href="<?= base_url('admin/kategori/hapus/') . $k['id_kategori'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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