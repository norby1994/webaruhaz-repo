<?php session_start(); ?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<title>NetShop</title>
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
						require_once 'php/categories.php';
						category_menu();
 ?>
					</ul>
				</nav>
			</header>
			<br class="clearfix" />

			<div id="core" class="landing pull-left">
				<h2>Üdvözlünk a NetShop oldalán!</h2>
				<h3 class="pull-center top5-title">Legújabb Termékeink</h3>
				<?php
				require_once "/php/connection.php";
				$friss_termek = "SELECT * FROM termek WHERE rownum <= 6 ORDER BY termek_id DESC";
				$stid = oci_parse($connect, $friss_termek);
				if (!$stid) {
					$e = oci_error($connect);
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}

				// lekérdezés logikájának ellenőrzése
				$r = oci_execute($stid);
				if (!$r) {
					$e = oci_error($stid);
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}

				while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) :
				?>
				<div class="top5">
					<div class="top5-img">
						<a href="/netshop/product-profil.php?pid=<?php echo $row['TERMEK_ID']; ?>"><img src="<?php echo $row['TERMEK_KEP']; ?>" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="/netshop/product-profil.php?pid=<?php echo $row['TERMEK_ID']; ?>"><?php echo iconv("ISO-8859-1", "UTF-8", $row['TERMEK_NEV']); ?></a>
					</div>
					<div class="top5-price">
						<a href="php/cart.php?add_id=<?php echo $row['TERMEK_ID']; ?>"><img src="/netshop/img/cart.png" alt="Kosárba tesz!" /></a> <?php echo $row['AR']; ?> Ft
					</div>
				</div>
				<?php 
				endwhile;
				oci_free_statement($stid);
				oci_close($connect);
				?>
				
				<br class="clearfix" />
				<br class="clearfix" />

				<h3 class="pull-center top5-title">Legnépszerűbb Termékeink</h3>

				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="img/p02.jpg" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="">Terméknév</a>
					</div>
					<div class="top5-price">
						5.000 HUF
					</div>
				</div>

				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="img/p02.jpg" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="">Terméknév</a>
					</div>
					<div class="top5-price">
						5.000 HUF
					</div>
				</div>

				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="img/p02.jpg" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="">Terméknév</a>
					</div>
					<div class="top5-price">
						5.000 HUF
					</div>
				</div>

				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="img/p02.jpg" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="">Terméknév</a>
					</div>
					<div class="top5-price">
						5.000 HUF
					</div>
				</div>

				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="img/p02.jpg" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href="">Terméknév</a>
					</div>
					<div class="top5-price">
						5.000 HUF
					</div>
				</div>

			</div>

			<?php
	include "footer.php";
 ?>
