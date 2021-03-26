<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-h flex-sb">
		<div class="w-size10 p-t-30 respon5 m-l-100 m-t-50">
			<img src="<?= base_url('assets/img/myprofile/') . $profile['foto'] ;?>" alt="<?= $profile['nama'] ;?>" width="150" height="150" class="rounded-circle">
		</div>

		<div class="w-size20 p-t-30">
			<h4 class="m-text16 p-b-10">
				Data Profile
			</h4>
			<!--  -->
			<div class="p-t-10 p-b-60">
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Nama
					</div>
					<div class="s-text20 w-size15">
						<?= ucfirst($profile['nama']) ;?>
					</div>
				</div>
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Email
					</div>
					<div class="s-text20 w-size15">
						<?= ucfirst($profile['email']) ;?>
					</div>
				</div>
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Username
					</div>
					<div class="s-text20 w-size15">
						<?= ucfirst($profile['username']) ;?>
					</div>
				</div>
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Alamat
					</div>
					<div class="s-text20 w-size15" style="width: 600px;">
						<?= ucfirst($profile['alamat']) ;?>
					</div>
				</div>
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Telephone
					</div>
					<div class="s-text20 w-size15">
						<?= ucfirst($profile['telp']) ;?>
					</div>
				</div>
				<div class="flex-m flex-w p-b-10 ">
					<div class="s-text20 w-size15">
						Daftar Akun
					</div>
					<div class="s-text20 w-size15">
						<?= date("d F Y", $profile['tanggal_daftar']) ;?>
					</div>
				</div>
				<div class="flex-r-m flex-w p-t-10">
					<div class="w-size16 flex-m flex-w">
						<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
							<!-- Button -->
							<a href="<?= base_url('member/member/edit_profile') ;?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
								Edit Data Profile
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
