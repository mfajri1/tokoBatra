 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<a href="<?= base_url('admin/menu/tambahMenu') ;?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Menu</a><br><br>
 					<div class="col-sm-8">
 						<table id="example1" class="table table-bordered table-sm">
 							<thead>
 								<tr>
 									<th>Id</th>
 									<th>Nama Menu</th>
 									<th>Aksi</th>
 								</tr>
 							</thead>
 							<tbody>
 								<?php $i = 1 ;?>
 								<?php foreach ($menu as $m) : ?>
 									<tr>
 										<td><?= $i++ ;?></td>
 										<td><?= ucfirst($m['nama_menu']) ;?></td>
 										<td>
 											<a href="<?= base_url('admin/menu/ubahMenu/') . $m['id_menu'];?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
 										</td>
 									</tr>
 								<?php endforeach ?>
 							</tbody>
 						</table>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>