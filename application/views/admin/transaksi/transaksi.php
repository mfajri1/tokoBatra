 <section class="content">
 	<div class="row">
 		<div class="col-xl-12">
 			<div class="box">
 				<div class="box-header">
 					<h3 class="box-title">Tabel Transaksi Pelanggan</h3>
 				</div>
 				<div class="box-body">
 					<?= $this->session->flashdata('pesan') ;?>
 					<table id="example1" class="table table-bordered table-sm">
 						<thead>
 							<tr>
 								<th>id</th>
 								<th>Kode Transaksi</th>
 								<th>Nama Pelanggan</th>
 								<th>Total Transaksi</th>
 								<th>Tanggal Transaksi</th>
 								<th>Status Bayar</th>
 								<th>Bukti Bayar</th>
 								<th>Aksi</th>
 							</tr>
 						</thead>
 						<tbody>
 							<?php $i=1; ?>
 							<?php foreach ($transaksi as $tr): ?>
 								<tr>
 									<td><?= $i++ ;?></td>
 									<td><?= ucfirst($tr['kode_transaksi']) ;?></td>
 									<td><?= ucfirst($tr['nama_penerima']) ;?></td>
 									<td><?= ucfirst($tr['jumlah_bayar']) ;?></td>
 									<td><?= date('d-m-Y', $tr['tanggal_transaksi']) ;?></td>
 									<td><?= ucfirst($tr['status_bayar']) ;?></td>
 									<td><img src="<?= base_url('assets/img/bukti_bayar/') . $tr['bukti_bayar'] ;?>" alt="none" width="80"></td>
 									 <td>
 										<a href="<?= base_url('admin/transaksi/detail/') . $tr['id_header_transaksi'];?>" class="btn btn-warning btn-xs"><i class="fa fa-info"></i></a>
 										<a href="<?= base_url('admin/transaksi/hapus/') . $tr['kode_transaksi'];?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Menghapus Data Ini??')"><i class="fa fa-trash"></i></a>
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