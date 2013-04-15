<?php require_once "php/session.php"; ?>
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
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>

                <div id="bejelentkezes" class="headerbar-form pull-right">
                	<ul>
                		<li><a href="login.php">Bejelentkezés felhasználóként</a></li>
	                    <li><a href="admin/login.php">Bejelentkezés adminként</a></li>
	                    <li><a href="registration.php">Regisztráció</a></li>
                	</ul>
                </div>

                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

            		<div id="core" class="landing pull-left">
			<h2>Üdvözlünk a NetShop oldalán!</h2>
			<h3 class="pull-center top5-title">Legújabb Termékeink</h3>
			
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
        
      <?php include "footer.php"; ?>
