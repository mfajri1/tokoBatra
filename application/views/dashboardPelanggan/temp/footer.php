<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					LAYANAN Public
				</h4>

				<div>
					<p class="s-text7 w-size27 text-justify">
						Ada Pertanyaan? Jika Ingin Mengetahui Tentang Toko Silahkan Datang Langsung Ke Alamat <?= ucfirst($konfig['alamat']) ?> Atau Dapat Juga Menghubungi Nomor <?= $konfig['telp'] ;?> .
					</p>

					<div class="flex-m p-t-30">
						<a href="<?= $konfig['fb'] ;?>" class="topbar-social-item fa fa-facebook" target="_blank"></a>
						<a href="<?= $konfig['instagram'] ;?>" class="topbar-social-item fa fa-instagram" target="_blank"></a>
						<a href="<?= $konfig['wa'] ;?>" class="topbar-social-item fa fa-phone-square" target="_blank"></a>
						<a href="<?= $konfig['email'] ;?>" class="topbar-social-item fa fa-envelope-o" target="_blank"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Categories
				</h4>
				<ul>
					<?php foreach ($kategori as $k): ?>
						<li class="p-b-9">
							<a href="#<?= $k['id_kategori'] ;?>" class="s-text7">
								<?= ucfirst($k['nama_kategori']) ;?>
							</a>
						</li>
					<?php endforeach ?>
				</ul>	
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Search
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							About Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Contact Us
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="#" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="#" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved.
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		// $('.block2-btn-addcart').each(function(){
		// 	var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to cart !", "success");
		// 	});
		// });

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>js/main.js"></script>
	<!-- buat javascript sendiri -->
	<script type="text/javascript" src="<?= base_url('assets/front/') ;?>script.js"></script>

</body>
</html>
