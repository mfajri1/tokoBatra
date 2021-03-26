<!-- Header -->
<header class="header1">
	<!-- Header desktop -->
	<div class="container-menu-header">
		<div class="topbar">
			<div class="topbar-social">
				<a href="<?= $konfig['fb'] ;?>" class="topbar-social-item fa fa-facebook"></a>
				<a href="<?= $konfig['instagram'] ;?>" class="topbar-social-item fa fa-instagram" target="_blank"></a>
				<a href="<?= $konfig['wa'] ;?>" class="topbar-social-item fa fa-phone-square"></a>
				<a href="<?= $konfig['email'] ;?>" class="topbar-social-item fa fa-envelope-o"></a>
			</div>

			<span class="topbar-child1">
				Belanja Lah Sebanyak Banyaknya
			</span>

			<div class="topbar-child2">
				<span class="topbar-email">
					<?= ucfirst($tampil['nama']) ;?>
				</span>
				<div class="topbar-language rs1-select2">
					<select class="selection-1" name="time">
						<option><?= $konfig['telp'] ;?></option>
						<option><?= $konfig['email'] ;?></option>
					</select>
				</div>
			</div>
		</div>

		<div class="wrap_header">
			<!-- Logo -->
			<a href="index.html" class="logo">
				<img src="<?= base_url('assets/img/konfig/') . $konfig['logo'] ;?>" alt="IMG-LOGO" width="200" height="50">
			</a>

			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<?php foreach ($role as $r): ?>
							<?php 
							$id_access	= $r['id_access'];
							$query 		= " SELECT *
							FROM `tb_sub_menu` JOIN `role_acces`
							ON `tb_sub_menu`.`access_id` = `role_acces`.`id_access`
							WHERE `tb_sub_menu`.`access_id` = $id_access
							AND `tb_sub_menu`.`menu_active` = 1
							";
							$menu = $this->db->query($query)->result_array();
							?>
							<?php foreach ($menu as $m): ?>
								<?php if ($m['link'] == $nama_sub_menu): ?>
									<li class="sale-noti">
								<?php else: ?>
									<li>
								<?php endif ?>
								<!-- ini untuk admin -->
								<?php if ($m['access_id'] == 1): ?>
									<a href="<?=base_url('admin/') . $m['link'] ;?>"><?= $m['title_menu'] ;?></a>
									<?php else: ?>	
										<!-- untuk halaman member yang mana tidak ada menu dashboard -->
										<a href="<?=base_url('member/member/') . $m['link'] ;?>"><?= $m['title_menu'] ;?></a>
									<?php endif ?>
								</li>
							<?php endforeach ?>
						<?php endforeach ?>
					</ul>
				</nav>
			</div>
			<!-- Header Icon -->
			<div class="header-icons">
				<div class="header-wrapicon2">
					<img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" class="header-icon1 js-show-header-dropdown foto-profile" alt="ICON">

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem text-center">
							<li class="header-cart-item">
								<div class="foto-pro">
									<img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" alt="IMG" class="foto-profile">
								</div>

								<div class="header-cart-item-txt">
									<h3 class="header-cart-item-name">
										<b><?= ucfirst($tampil['nama']) ;?></b>
									</h3>
									<p><?= ucfirst($tampil['email']) ;?></p>
								</div>
							</li>
						</ul>
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('member/member/profile') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-primary">
									Lihat Profile
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('auth/logout') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-danger">
									Log Out
								</a>
							</div>
						</div>
					</div>
				</div>

				<span class="linedivide1"></span>

				<div class="header-wrapicon2">
					<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<!-- $content datanya di ambil dari controller belanja method add -->
					<?php $belanja= $this->cart->contents(); ?>

					<span class="header-icons-noti"><?= count($belanja) ;?></span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<div class="row p-b-20">
							<div class="col-sm-4">
								<a href="<?= base_url('member/belanja/konfirm');?>" class="pull-left"><i class="fa fa-check-square"> Konfirm</i></a>
							</div>
							<div class="col-sm-4">
								<a href="<?= base_url('member/belanja/riwayatBelanja');?>" class="pull-left"><i class="fa fa-history"> Riwayat</i></a>
							</div>
							<div class="col-sm-4 wa">
								<a href="<?= base_url('member/belanja/destroy');?>" class="pull-right"><i class="fa fa-trash"> Hapus</i></a>
							</div>
						</div>
						<ul class="header-cart-wrapitem">
							<?php if (!empty($belanja)): ?>
								<!-- total belnja sebelum di tambah ke keranjang -->
								<?php $total_belanja = 0;  ?>
								<!-- tampilkan data belanja -->
								<?php foreach ($belanja as $items): ?>
									<?php 
										$id = $items['id'];
										$id_produk 	= ['id_produk' => $id];	
										$id_produk_tampil = $this->model_produk->detail($id_produk)->row_array();
									 ?>
									<li class="header-cart-item">
										<div class="header-cart-item-img" style="height: 60px;">
											<img src="<?= base_url('assets/img/produk/') . $items['gambar'] ;?>" alt="<?= $items['name'] ;?>">
										</div>
										<div class="header-cart-item-txt">
											<a href="<?= base_url('member/member/detailProduk/') . $id_produk_tampil['id_produk'] ;?>" class="header-cart-item-name pull-right" style="font-weight: bold;">
												<?= ucfirst($items['name']) ;?>
											</a>

											<span class="header-cart-item-info pull-right" style="margin-top: -10px;">
												<?php $i = 1 ;?>
												<?= $items['qty']; ?> X <?= number_format($items['price'],0,'.',',') ;?><?= ', Subtotal : ' .number_format($items['subtotal'],0,'.',',') ;?>
											</span>
											<div class="flex-r-m flex-w p-t-10 pull-right">
												<div class="flex-m flex-w">
													<div class="flex-w bo5 of-hidden menu-tambah-keranjang" style="margin-top: -5px;">
														<!-- fungsi menambahkan jumlah barang dengan javascript sesuai dengan nama class nya yaitu qty -->
														<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 tambah-keranjang">
															<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
														</button>

														<input class="size8 m-text18 t-center qty tambah-keranjang" type="number" name="qty" value="1" >


														<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 tambah-keranjang">
															<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
														</button>
														<!-- end -->
													</div>
												</div>
											</div>
										</div>
									</li>
								<?php endforeach ?>
							<?php else: ?>
								<li class="header-cart-item text-center">
									<p>Keranjang Kosong <i class="fa fa-empty fa-hourglass-2"></i></p>
								</li>
							<?php endif ?>
						</ul>
						<div class="header-cart-total">
							<?= 'Total : ' . $this->cart->format_number($this->cart->total()); ?>
						</div>
						<br>
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('member/belanja/detailBelanja') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('member/belanja/checkout') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="index.html" class="logo-mobile">
			<img src="<?= base_url('assets/img/konfig/') . $konfig['logo'] ;?>"  alt="IMG-LOGO">
		</a>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<div class="header-wrapicon2">
					<img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" class="header-icon1 js-show-header-dropdown foto-profile" alt="ICON">

					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem text-center">
							<li class="header-cart-item">
								<div class="foto-pro">
									<img src="<?= base_url('assets/img/myprofile/') . $tampil['foto'] ;?>" alt="IMG" class="foto-profile">
								</div>

								<div class="header-cart-item-txt">
									<h3 class="header-cart-item-name">
										<b><?= ucfirst($tampil['nama']) ;?></b>
									</h3>
									<p><?= ucfirst($tampil['email']) ;?></p>
								</div>
							</li>
						</ul>
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-primary">
									Lihat Profile
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('auth/logout') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-danger">
									Log Out
								</a>
							</div>
						</div>
					</div>
				</div>

				<span class="linedivide2"></span>

				<div class="header-wrapicon2">
					<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					
					<!-- untuk keranjang mobile -->
					<?php $belanja= $this->cart->contents(); ?>

					<span class="header-icons-noti"><?= count($belanja) ;?></span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<!-- tampilan keranjang mobile -->
							<?php if (!empty($belanja)): ?>
								<?php $total_belanja = 0; ?>
								<?php foreach ($belanja as $items): ?>
									<?php 
										$id = $items['id'];
										$id_produk 	= ['id_produk' => $id];	
										$id_produk_tampil = $this->model_produk->detail($id_produk)->row_array();
									 ?>
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="<?= base_url('assets/img/produk/') . $items['gambar'] ;?>" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="<?= base_url('member/member/detailProduk/') . $id_produk_tampil['slug_produk'] ;?>" class="header-cart-item-name">
												<?= ucfirst($items['name']) ;?>
											</a>

											<span class="header-cart-item-info">
												<?php $i = 1 ;?>
												<?= $items['qty']; ?> X <?= number_format($items['price'],0,'.',',') ;?><?= ', Subtotal : ' .number_format($items['subtotal'],0,'.',',') ;?>
											</span>
											<div class="menu_belanja">
												<a href="<?= base_url('member/belanja/edit/') . $items['id'] ;?>"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('member/belanja/hapus/') . $items['id'] ;?>"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								<?php endforeach ?>
							<?php else: ?>
								<li class="header-cart-item text-center">
									<p>Keranjang Kosong <i class="fa fa-empty fa-hourglass-2"></i></p>
								</li>
							<?php endif ?>
						</ul>

						<div class="header-cart-total">
							<?= 'Total : ' . $this->cart->format_number($this->cart->total()); ?>
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('member/belanja/detailBelanja') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?= base_url('member/belanja/checkout') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							<?= ucfirst($tampil['nama']) ;?>
						</span>
						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option><?= $konfig['telp'] ;?></option>
								<option><?= $konfig['email'] ;?></option>
							</select>
						</div>
					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="<?= $konfig['fb'] ;?>" class="topbar-social-item fa fa-facebook"></a>
						<a href="<?= $konfig['instagram'] ;?>" class="topbar-social-item fa fa-instagram" target="_blank"></a>
						<a href="<?= $konfig['wa'] ;?>" class="topbar-social-item fa fa-phone-square"></a>
						<a href="<?= $konfig['email'] ;?>" class="topbar-social-item fa fa-envelope-o"></a>
					</div>
				</li>

				<?php foreach ($role as $r): ?>
					<?php 
					$id_access	= $r['id_access'];
					$query 		= " SELECT *
					FROM `tb_sub_menu` JOIN `role_acces`
					ON `tb_sub_menu`.`access_id` = `role_acces`.`id_access`
					WHERE `tb_sub_menu`.`access_id` = $id_access
					AND `tb_sub_menu`.`menu_active` = 1
					";
					$menu = $this->db->query($query)->result_array();
					?>
					<?php foreach ($menu as $m): ?>
						<?php if ($m['link'] == $nama_sub_menu): ?>
							<li class="sale-noti item-menu-mobile bg-abu">
								<?php else: ?>
									<li class="item-menu-mobile ahover">
									<?php endif ?>
									<!-- ini untuk admin -->
									<?php if ($m['access_id'] == 1): ?>
										<a href="<?=base_url('admin/') . $m['link'] ;?>"><?= $m['title_menu'] ;?></a>
									<?php else: ?>	
											<!-- untuk halaman member yang mana tidak ada menu dashboard -->
										<a href="<?=base_url('member/member/') . $m['link'] ;?>"><?= $m['title_menu'] ;?></a>
									<?php endif ?>
									</li>
								<?php endforeach ?>
							<?php endforeach ?>
						</ul>
					</nav>
				</div>
			</header>