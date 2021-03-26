 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<a href="<?= base_url('admin/role_Access/tambahRoleAccess') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah SubMenu</a><br><br>
 					<table id="example1" class="table table-bordered table-sm">
 						<thead>
 							<tr>
 								<th>Id</th>
 								<th>Nama Access</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i = 1 ;?>
 							<?php foreach ($roleAccess as $ra) : ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><?= ucfirst($ra['access']) ;?></td>
 									<td>
 										<a href="<?= base_url('admin/role_Access/tampilMenuAccess/') . $ra['id_access'];?>" class="btn btn-warning btn-xs"><i class="fa fa-info-circle"></i> <?= $ra['total_menu'] ;?></a>
 										<a href="<?= base_url('admin/role_Access/ubah/') . $ra['id_access'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 										<a href="<?= base_url('admin/role_Access/hapus/') . $ra['id_access'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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
 