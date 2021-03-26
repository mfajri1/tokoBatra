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
 								<th>Access Id</th>
 								<th>Nama Menu</th>
 								<th>Link</th>
 								<th>Active</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i = 1 ;?>
 							<?php foreach ($subMenu as $sm) : ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><?= ucfirst($sm['access']) ;?></td>
 									<td><?= ucfirst($sm['title_menu']) ;?></td>
 									<td><?= ucfirst($sm['link']) ;?></td>
 									<!-- untuk mencetang otomatis jika sesuai dengan tb_user_acces_menu buatnya di helpers -->
 									<td><input type="checkbox" class="form-select" name="menu_active" <?= checkSelect($tampil_access['id_access'], $sm['access_id']) ;?> data-role="<?= $tampil_access['id_access'] ?>" data-subMenu="<?= $sm['access_id'] ?>"></select></td>
 								</tr>
 							<?php endforeach ?>
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 