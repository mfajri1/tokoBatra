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
					<?php $uri = $this->uri->segment(2); ?>
					<ul class="main_menu">
						<li <?php if ($uri != $nama_sub_menu) {
							echo 'class="sale-noti"';
						}else{ echo 'class=""';} ?>>
							<a href="<?= base_url('dashboard') ;?>">Home</a>
						</li>

						<li <?php if ($uri != $nama_sub_menu) {
							echo 'class=""';
						}else{ echo 'class="sale-noti"';} ?>>
							<a href="<?= base_url('dashboard/produk') ;?>">Produk</a>
						</li>

						<li>
							<a href="about.html">About</a>
						</li>

						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">
				<div class="header-wrapicon2">
					<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown foto-profile" alt="ICON">

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown" style="width: 150px;">
						<ul class="header-cart-wrapitem text-center" >
							<li class="header-cart-item">
								<div class="foto-prodash text-center" style="margin: auto">
									<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-01.png" class="foto-profile text-center" alt="ICON">
								</div>
							</li>
						</ul>
						<div class="header-cart-buttons text-center">
							<div class="header-cart-wrapbtn" style="margin: 10px;">
								<!-- Button -->
								<a href="<?= base_url('auth/login') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-primary" style="width: 100px;">
									Login
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
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6 wa">
								<a href="<?= base_url('dashboard/destroy');?>"><i class="fa fa-trash"> Hapus Keranjang</i></a>
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
											<a href="<?= base_url('member/member/detailProduk/') . $id_produk_tampil['id_produk'] ;?>" class="header-cart-item-name" style="font-weight: bold;">
												<?= ucfirst($items['name']) ;?>
											</a>

											<span class="header-cart-item-info" style="margin-top: -10px;">
												<?php $i = 1 ;?>
												<?= $items['qty']; ?> X <?= number_format($items['price'],0,'.',',') ;?><?= ', Subtotal : ' .number_format($items['subtotal'],0,'.',',') ;?>
											</span>
											<div class="flex-r-m flex-w p-t-10">
												<div class="flex-m flex-w">
													<div class="flex-w bo5 of-hidden m-r-85 menu-tambah-keranjang" style="margin-top: -5px;">
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
								<a href="<?= base_url('dashboard/detailBelanja') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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
			<div class="header-icons-mobile text-center">
				<div class="header-wrapicon2 text-center">
					<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-01.png" class="header-icon1 js-show-header-dropdown foto-profile" alt="ICON">

					<div class="header-cart header-dropdown text-center" style="width: 200px;">
						<ul class="header-cart-wrapitem">
							<li class="header-cart-item text-center">
								<div class="foto-prodash" style="margin: auto;">
									<img src="<?= base_url('assets/front/') ;?>images/icons/icon-header-01.png" class="foto-profile text-center" alt="ICON">
								</div>
							</li>
						</ul>
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn" style="margin: auto;">
								<!-- Button -->
								<a href="<?= base_url('auth/login') ;?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4 bg-danger">
									Login
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
				<li class="item-menu-mobile">
					<li <?php if ($uri != $nama_sub_menu) {
						echo 'class="sale-noti item-menu-mobile bg-abu"';
					}else{ echo' class="ahover item-menu-mobile"';} ?>>
						<a href="<?= base_url('dashboard') ;?>">Home</a>
					</li>

					<li <?php if ($uri == $nama_sub_menu) {
						echo 'class="sale-noti item-menu-mobile bg-abu"';
					}else{ echo' class="ahover item-menu-mobile"';} ?>>
						<a href="<?= base_url('dashboard/produk') ;?>">Produk</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
			</ul>
		</nav>
	</div>
</header>