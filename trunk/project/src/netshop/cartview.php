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
	
	if ($_SESSION['tipus'] == "admin") {
		echo '<script type="text/javascript">
			alert("Adminoknak nem szabad.");
			window.location.href="index.php";</script>';
	}
	
	
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
				<h2>Bevásárlókosár</h2>
				<h3 class="pull-center top5-title">Bevásárlókosár</h3>
				<?php
				if (!empty($_SESSION['cart']['items'])) :
				foreach ($_SESSION['cart']['items'] as $key => $value) :
				?>
				<div class="top5">
					<div class="top5-img">
						<a href=""><img src="<?php echo $value['termek_kep']; ?>" alt="" /></a>
					</div>
					<div class="top5-name">
						<a href=""><?php echo $value['nev']; ?></a>
					</div>
					<div class="top5-price">
						<a href="php/cart.php?remove_id=<?php echo $value['id']; ?>"><img src="/netshop/img/cancel.png" alt="Kivesz a kosárból!" /></a> <?php echo $value['ar']; ?> FT
					</div>
				</div>
				<?php 
				endforeach;
				echo '<a href="php/cart.php?shopping=true">Vásárlás</a>';
				else :
					?>
					A bevásárló kosaracska üres.
					<?php
				endif;
				?>
			<?php
	include "footer.php";
 ?>
