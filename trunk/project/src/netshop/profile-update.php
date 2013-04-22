<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Felhasználói profil módosítása</title>
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
        <?php
			require_once "php/felhasznalo.php";
				session_check();
        ?>

        <div id="wrapper">
        <?php require_once "template/felhasznalo-menu.php" ?>
        
        <div id="core" class="profile pull-left">
            <h2 class="pull-center">Profil módosítások</h2>
                
                <div class="acc-row"><span class="acc-info"><label for="nev">Felhasznaló név:</label></span> <span class="acc-datam"><input type="text" placeholder="<?php echo $_SESSION['nev']; ?>" name="nev" /></span></div>
                <br class="clearfix" />
                
                <div class="acc-row"><span class="acc-info"><label for="email">Email:</label></span> <span class="acc-datam"><input type="text" placeholder="<?php echo $_SESSION['email']; ?>" name="email" /></span></div>           
                <br class="clearfix" />
                
                <div class="acc-row"><span class="acc-info"><label for="szul_ido">Születési dátum:</span> <span class="acc-datam"><input type="text" placeholder="<?php echo $_SESSION['szul_ido']; ?>" name="szul_ido" /></span></div>
                <br class="clearfix" />
                
                <div class="acc-row"><span class="acc-info">Lakcím:</span><br />
                
                    <div class="acc-datam">
                    <label for="ir_szam" class="pull-left">Irányítószám:</label> <input type="text" name="ir_szam" placeholder="6623" /><br class="clearfix"/>
                    <label for="varos" class="pull-left">Város:</label> <input type="text" name="varos" placeholder="Szeged"/><br class="clearfix"/>
                    <label for="utca" class="pull-left">Utca:</label> <input type="text" name="utca" placeholder="Szivárvány utca" required="required" /><br class="clearfix"/>
                    <label for="hazszam" class="pull-left">Házszám:</label> <input type="text" name="hazszam" placeholder="52" /><br class="clearfix"/>
                    </div>
                </div>
                <br class="clearfix" />
                
                <div class="acc-row"><span class="acc-info"><label for="telefon">Telefon:</label></span> <span class="acc-datam"><input type="text" name="telefon" placeholder="<?php echo $_SESSION['telefon']; ?>" /></span></div>
                <br class="clearfix" />
                
                                
                <form action="" method="POST" class="modosit">
                    <input type="submit" value="Módosít" class="pull-center" name="modosit" />
                </form>
                
        </div>
        
        <div id="side2" class="sidebars pull-right">
            <h3>Kosár</h3>
        </div>
        
		<?php include "footer.php"; ?>