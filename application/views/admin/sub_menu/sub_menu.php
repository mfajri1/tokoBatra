 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<a href="<?= base_url('admin/sub_menu/tambahSubMenu') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah SubMenu</a><br><br>
 					<table id="example1" class="table table-bordered table-sm">
 						<thead>
 							<tr>
 								<th>Id</th>
 								<th>Role</th>
 								<th>Nama Menu</th>
 								<th>Link</th>
 								<th>Active</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i = 1 ;?>
 							<?php foreach ($sub_menu as $m) : ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><?= ucfirst($m['access']) ;?></td>
 									<td><?= ucfirst($m['title_menu']) ;?></td>
 									<td><?= ucfirst($m['link']) ;?></td>
 									<?php if ($m['menu_active'] == "1"): ?>
 										<td><?= ucfirst('Active') ;?></td>
 									<?php else: ?>
 										<td><?= ucfirst('Dont Active') ;?></td>
 									<?php endif ?>
 									<td>
 										<a href="<?= base_url('admin/sub_menu/ubahSubMenu/') . $m['id_sub_menu'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 										<a href="<?= base_url('admin/sub_menu/hapusSubMenu/') . $m['id_sub_menu'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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