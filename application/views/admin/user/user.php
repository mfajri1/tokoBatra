
	 <section class="content">
	 	<div class="row">
	 		<div class="col-xl-12">
	 			<div class="box">
	 				<div class="box-header">
			           <h3 class="box-title">Table Pengguna</h3>
			         </div>
			         <div class="box-body">
			         	<?= $this->session->flashdata('pesan') ;?>
			         	<a href="<?= base_url('admin/user/tambah') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Pengguna</a><br><br>
			         	<table id="example1" class="table table-bordered table-sm">
			         		<thead>
			         			<tr>
			         				<th>Id User</th>
			         				<th>Nama</th>
			         				<th>Email</th>
			         				<th>Username</th>
			         				<th>Akses Level</th>
			         				<th>Active</th>
			         				<th>Foto</th>
			         				<th>Aksi</th>
			         			</tr>
			         		</thead>
			         		<tbody>
			         			<?php $i=1; ?>
			         			<?php foreach ($user as $u): ?>
			         				<tr>
			         					<td><?= $i++ ;?></td>
			         					<td><?= ucfirst($u['nama']) ;?></td>
			         					<td><?= $u['email'] ;?></td>
			         					<td><?= ucfirst($u['username']) ;?></td>
			         					<td><?= ucfirst($u['access']) ;?></td>
			         					<td><?= ucfirst($u['active']) ;?></td>
			         					<td class="text-center"><img src="<?= base_url('assets/img/myprofile/') . $u['foto'] ;?>" alt="foto" width="50"></td>
			         					<td>
			         						<a href="<?= base_url('admin/user/detail/') . $u['id_user'];?>" class="btn btn-warning btn-xs"><i class="fa fa-info"></i></a>
			         						<a href="<?= base_url('admin/user/ubah/') . $u['id_user'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
			         						<a href="<?= base_url('admin/user/hapus/') . $u['id_user'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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