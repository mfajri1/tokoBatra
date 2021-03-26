 <section class="content">
	 	<div class="row">
	 		<div class="col-xl-12">
	 			<div class="box">
	 				<div class="box-header">
			           <h3 class="box-title">Tabel Kategori Produk</h3>
			         </div>
			         <div class="box-body">
			         	<?= $this->session->flashdata('pesan') ;?>
			         	<a href="<?= base_url('admin/rekening/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Kategori Produk</a><br><br>
			         	<table id="example1" class="table table-bordered table-sm">
			         		<thead>
			         			<tr>
			         				<th>No</th>
			         				<th>Nama Bank</th>
			         				<th>No Rekening</th>
			         				<th>Nama Pemilik</th>
			         				<th>Aksi</th>
			         			</tr>
			         		</thead>
			         		<tbody>
			         			<?php $i=1; ?>
			         			<?php foreach ($rekening as $r): ?>
			         				<tr>
			         					<td><?= $i++ ;?></td>
			         					<td><?= ucfirst($r['nama_bank']) ;?></td>
			         					<td><?= ucfirst($r['no_rekening']) ;?></td>
			         					<td><?= ucfirst($r['nama_pemilik']) ;?></td>
			         					<td>
			         						<a href="<?= base_url('admin/rekening/ubah/') . $r['id_rekening'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
			         						<a href="<?= base_url('admin/rekening/hapus/') . $r['id_rekening'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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