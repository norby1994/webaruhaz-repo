<?php session_start(); ?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<title>NetShop - Termék profilja</title>
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
						require_once '/php/products.php';
						
						category_menu();
						$termek = product_info($_GET['pid']);

 ?>
					</ul>
				</nav>
			</header>
			<br class="clearfix" />

			<div id="core" class="product pull-left">
			<img src="<?php echo $termek['TERMEK_KEP']; ?>" alt="" class="pp-img" />
			
			<h2 class="pp-name"><?php echo $termek['TERMEK_NEV']; ?></h2>
			
			<div class="pp-info">
				<?php echo iconv("ISO-8859-1", "UTF-8", $termek['ROVID_LEIRAS']); ?><br />
				<br />
				<form id="att">
					Méret: 
					<select>
						<option>S</option>
						<option>M</option>
						<option>L</option>
					</select><br />
					Szín:
					<select>
						<option>S</option>
						<option>M</option>
						<option>L</option>
					</select><br />
					<a id="cart" href="php/cart.php?add_id=<?php echo $_GET['pid']; ?>"><img src="/netshop/img/cart.png" alt="Kosárba tesz!" /></a>
				</form>
			</div>
			
			<div class="pp-desc">
			<h4>Termék leírás</h4>
			<p><?php echo iconv("ISO-8859-1", "UTF-8", $termek['HOSSZU_LEIRAS']); ?></p>
			</div>
		
        </div>
		
		<div id="side2" class="sidebars pull-right">
			<h3>Hasonló termékek</h3>
			<?php
				require_once '/php/products.php';
				list_similar($termek['KATEGORIA_ID']);
			?>
		</div>

			<?php
	include "footer.php";
 ?>
