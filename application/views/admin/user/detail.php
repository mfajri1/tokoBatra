<section class="content">
	<div class="row">
		<div class="col-sm-8">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Nama Pengguna</th>
						<td><?= ucfirst($detail['nama']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Email</th>
						<td><?= ucfirst($detail['email']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Username</th>
						<td><?= ucfirst($detail['username']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Alamat</th>
						<td><?= ucfirst($detail['alamat']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Telephone</th>
						<td><?= ucfirst($detail['telp']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Akses Level</th>
						<td><?= ucfirst($detail['access']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Aktive</th>
						<td><?= ucfirst($detail['active']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Tanggal Daftar</th>
						<td><?= date('H:i:s, D-M-Y',$detail['tanggal_daftar']) ;?></td>
					</tr>
					<tr>
						<th style="width:50%">Tanggal Update</th>
						<td><?= date('H:i:s, D-M-Y',$detail['tanggal_update']) ;?></td>
					</tr>				
				</table>
			</div>
		</div>
		<div class="col-sm-4 mt-auto">
			<img src="<?= base_url('assets/img/myprofile/') . $detail['foto'] ;?>" alt="" width="300" class="img-thumbnail">
		</div>
	</div>
</section>