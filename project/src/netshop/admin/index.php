<?php require_once "../php/session.php"; ?>
<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin profil</title>
        <meta name="description" content="Internetes áruház" />
        <meta name="author" content="Kasziba Szintia, Verebélyi Bertalan, Verebélyi Csaba" />
        <link rel="shortcut icon" href="../img/favicon.png" />
        <link rel="stylesheet" href="../css/reset.css" />
        <link rel="stylesheet" href="../css/style.css" />

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->

    </head>

    <body>
        <?php
		if (!isset($_SESSION['admin'])) {
			header("location:login.php");
			exit ;
		}
        ?>

        <div id="wrapper">
            
            <?php require_once "admin-menu.php" ?>

            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Profil beállítások</h2>

                <div class="acc-row">
                    <span class="acc-info">Regisztráció dátuma: </span><span class="acc-data">2013-APR-03.</span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Felhasznaló név:</span><span class="acc-data">Kun Béla</span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Email:</span><span class="acc-data">kun.bela@gmail.com</span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Születési dátum:</span><span class="acc-data">1990.08.08</span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Nem:</span><span class="acc-data">Férfi</span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Telefon:</span><span class="acc-data">06706664545</span>
                </div>
                <br class="clearfix" />

                <form action="" method="POST" class="modosit">
                    <input type="submit" value="Módosít" name="modosit" />
                </form>
            </div>

            <div id="side2" class="sidebars pull-right">
                <h3>Legutóbbi vásárlások</h3>
            </div>

            <?php include "../footer.php"
            ; ?>
