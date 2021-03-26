<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="<?= $konfig['metatext'] ;?>">
	<meta name="keywords" content="<?= $konfig['keywords'] ;?>">
	<meta name="description" content="<?= $konfig['deskripsi'] ;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?= $title ;?></title>

<!--===============================================================================================-->
	<link rel="icon" type="image/jpg" href="<?= base_url('assets/img/konfig/') . $konfig['icon'] ;?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>vendor/noui/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ;?>css/main.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ;?>style.css">
<!--===============================================================================================-->
<!-- style pagination -->
<style>
	div.pagination a.item-pagination{
		margin: 0 1px 0 1px;
		width: 33px;
		height: 33px;
		text-align: center;
		font-size: 14px;
		padding-top: 4px;
		background-color: #585858;
		color: #ffffff;
		padding-top: -3px;
	}
	div.pagination a{
		margin: 0 1px 0 1px;
		width: 30px;
		height: 30px;
		text-align: center;
		font-size: 14px;
		padding-top: 4px;
		background-color: #222222;
		color: #ffffff;
		border-radius: 50%;	
	}
	div.pagination a:hover{
		background-color: #1212f9;
		color: #ffffff;
		border-radius: 50%;
	}
	div.pagination span.prev{
		background-color: #222222;
		color: #ffffff !important;
		margin-left: -28px;
		margin-top: -5px;
	} 
	div.pagination span.next{
		background-color: #222222;
		color: #ffffff !important;
		margin-top: -5px;	
	}

	div.pagination span.next:hover, div.pagination span.prev:hover{
		color: #03fc0f !important;
	}

</style>

</head>
<body class="animsition">