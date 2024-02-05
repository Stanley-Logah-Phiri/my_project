<?php include('inc/init.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Tnm Portal</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
		<!-- daterange picker -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap datepicker -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- iCheck for checkboxes and radio inputs -->
		<link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
		<!-- Bootstrap Color Picker -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
		<!-- Bootstrap time Picker -->
		<link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">	
		<!-- DataTables -->
		<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<!-- bootstrap slider -->
		<link rel="stylesheet" href="../assets/plugins/seiyria-bootstrap-slider/css/bootstrap-slider.min.css">
		<!-- fullCalendar -->
		<link rel="stylesheet" href="../assets/bower_components/fullcalendar/dist/fullcalendar.min.css">
  		<link rel="stylesheet" href="../assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
		<!-- Theme style -->
		<link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="../assets/plugins/iCheck/flat/blue.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

		<!-- Pace style -->
		<link rel="stylesheet" href="../assets/plugins/pace/pace.min.css">

		<!-- Inside Menu Styling-->
		<link rel="stylesheet" href="../assets/navcss/styles.css">
		<!-- Google Font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<style>
			.color-palette {
			height: 35px;
			line-height: 35px;
			text-align: center;
			}

			.color-palette-set {
			margin-bottom: 15px;
			}

			.color-palette span {
			display: none;
			font-size: 12px;
			}

			.color-palette:hover span {
			display: block;
			}

			.color-palette-box h4 {
			position: absolute;
			top: 100%;
			left: 25px;
			margin-top: -40px;
			color: rgba(255, 255, 255, 0.8);
			font-size: 12px;
			display: block;
			z-index: 7;
			}
		</style>
		<style>
			.example-modal .modal {
			position: relative;
			top: auto;
			bottom: auto;
			right: auto;
			left: auto;
			display: block;
			z-index: 1;
			}

			.example-modal .modal {
			background: transparent !important;
			}
		</style>
		<style>
			/* FROM HTTP://WWW.GETBOOTSTRAP.COM
			* Glyphicons
			*
			* Special styles for displaying the icons and their classes in the docs.
			*/

			.bs-glyphicons {
			padding-left: 0;
			padding-bottom: 1px;
			margin-bottom: 20px;
			list-style: none;
			overflow: hidden;
			}

			.bs-glyphicons li {
			float: left;
			width: 25%;
			height: 115px;
			padding: 10px;
			margin: 0 -1px -1px 0;
			font-size: 12px;
			line-height: 1.4;
			text-align: center;
			border: 1px solid #ddd;
			}

			.bs-glyphicons .glyphicon {
			margin-top: 5px;
			margin-bottom: 10px;
			font-size: 24px;
			}

			.bs-glyphicons .glyphicon-class {
			display: block;
			text-align: center;
			word-wrap: break-word; /* Help out IE10+ with class names */
			}

			.bs-glyphicons li:hover {
			background-color: rgba(86, 61, 124, .1);
			}

			@media (min-width: 768px) {
			.bs-glyphicons li {
				width: 12.5%;
			}
			}
		</style>
		<style type="text/css">
			.mt20{
				margin-top:20px;
			}
			.bold{
				font-weight:bold;
			}

			/* chart style*/
			#legend ul {
				list-style: none;
			}

			#legend ul li {
				display: inline;
				padding-left: 30px;
				position: relative;
				margin-bottom: 4px;
				border-radius: 5px;
				padding: 2px 8px 2px 28px;
				font-size: 14px;
				cursor: default;
				-webkit-transition: background-color 200ms ease-in-out;
				-moz-transition: background-color 200ms ease-in-out;
				-o-transition: background-color 200ms ease-in-out;
				transition: background-color 200ms ease-in-out;
			}

			#legend li span {
				display: block;
				position: absolute;
				left: 0;
				top: 0;
				width: 20px;
				height: 100%;
				border-radius: 5px;
			}
  	    </style>
		<style type="text/css">
			.mt200{
				margin-top:20px;
			}
			.boldh{
				font-weight:bold;
			}

			/* chart style*/
			#legends ul {
				list-style: none;
			}

			#legends ul li {
				display: inline;
				padding-left: 30px;
				position: relative;
				margin-bottom: 4px;
				border-radius: 5px;
				padding: 2px 8px 2px 28px;
				font-size: 14px;
				cursor: default;
				-webkit-transition: background-color 200ms ease-in-out;
				-moz-transition: background-color 200ms ease-in-out;
				-o-transition: background-color 200ms ease-in-out;
				transition: background-color 200ms ease-in-out;
			}

			#legends li span {
				display: block;
				position: absolute;
				left: 0;
				top: 0;
				width: 20px;
				height: 100%;
				border-radius: 5px;
			}
  		</style>
	</head>
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">