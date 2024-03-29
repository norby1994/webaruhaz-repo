<?php session_start(); ?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<title>NetShop - <?php echo $_GET['id']; ?>. kategória termékei</title>
		<meta name="description" content="Internetes áruház" />
		<meta name="author" content="Kasziba Szintia, Verebélyi Bertalan, Verebélyi Csaba" />
		<link rel="shortcut icon" href="img/favicon.png" />
		<link rel="stylesheet" href="css/reset.css" />
		<link rel="stylesheet" href="css/style.css" />

		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
		<![endif]-->

	</head>

	<body>
		<div id="wrapper">
			<header class="title-head">
				<h1 class="cim pull-left"><a rel="external" href="/netshop/index.php"><img src="/netshop/img/header.png" alt="Netshop" /></a></h1>

				<?php
	require_once '/template/bejelentkezes-menu.php';
 ?>

				<br class="clearfix" />

				<nav>
					<ul>
						<?php
						require_once '/php/categories.php';
						category_menu();
 ?>
					</ul>
				</nav>
			</header>
			<br class="clearfix" />

			<div id="core" class="landing pull-left">
				<?php category_view($_GET['id']); ?>
				
			</div>

			<?php
	include "footer.php";
 ?>
