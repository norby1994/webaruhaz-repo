<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Felhasználó regisztráció</title>
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
                <h1 class="cim pull-left"><a rel="external" href="index.html">NetShop</a></h1>

                <div id="kijelentkezes" class="pull-right">
                    <a href="logout.php">Kijelentkezés</a>
                </div>

                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a rel="external" href="#">kategória1</a>
                        </li>
                        <li>
                            <a rel="external" href="#">kategória2</a>
                        </li>
                        <li>
                            <a rel="external" href="#">kategória3</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

            <div id="side" class="sidebars pull-left">
                
            </div>

        <div id="core" class="home pull-left">
			<h2 class="pull-center">Regisztráció*</h2>
	
			<form action="" method="post" name="regisztracio" id="regisztracio" class="regisztracio" enctype="multipart/form-data">
					<label for="nev" class="pull-left">Név:</label>
						<input type="text" id="nev" name="nev" class="pull-right" placeholder="név" required="required" /><br class="clearfix"/>
						
					<label for="nem" class="pull-left">Nem:</label>
						<div class="pull-right"><input type="radio" name="nem" value="1" required="required" /> Férfi <input type="radio" name="nem" value="0" required="required" /> Nő</div><br class="clearfix"/>
						
					<span id="szuldatum" class="pull-left">Születési dátum:</span><br class="clearfix"/>
					<label for="ev">Év:</label> <input type="text" id="ev" name="ev" placeholder="év" required="required" />
					<label for="honap">Hónap:</label> <input type="text" id="honap" name="honap" placeholder="hónap" required="required" />
					<label for="nap">Nap:</label> <input type="text" id="nap" name="nap" class="pull-right" placeholder="nap" required="required" /><br class="clearfix"/>
						
	
					<label for="ir_szam" class="pull-left">Irányítószám:</label> <input type="text" id="ir_szam" name="ir_szam" class="pull-right" placeholder="ir.szám" required="required" /><br class="clearfix"/>
					<label for="varos" class="pull-left">Város:</label> <input type="text" id="varos" name="varos" class="pull-right" placeholder="város" required="required" /><br class="clearfix"/>
					<label for="utca" class="pull-left">Utca:</label> <input type="text" id="utca" name="utca" class="pull-right" placeholder="utca" required="required" /><br class="clearfix"/>
					<label for="hazszam" class="pull-left">Házszám:</label> <input type="text" id="hazszam" name="hazszam" class="pull-right" placeholder="hsz" required="required" /><br class="clearfix"/>
						
					<label for="telefon" class="pull-left">Telefonszám:</label>
						<input type="tel" id="telefon" name="telefon" class="pull-right" placeholder="telefonszám" required="required" /><br class="clearfix"/>
						
					<label for="email" class="pull-left">Email cím:</label>
						<input type="email" id="email" name="email" class="pull-right" placeholder="email" required="required" /><br class="clearfix"/>
						
					<label for="jelszo" class="pull-left">Jelszó:</label>
						<input type="password" id="jelszo" name="jelszo" class="pull-right" placeholder="jelszó" required="required" /><br class="clearfix"/>
						
					<label for="jelszo2" class="pull-left">Jelszó mégegyszer:</label>
						<input type="password" id="jelszo2" name="jelszo2" class="pull-right" placeholder="jelszó" required="required" /><br class="clearfix"/>
				<p id="hint">*Az űrlapon lévő összes mező kitöltése kötelező</p>	
				<input type="submit" name="submit-button" value="Elküld" id="submit-button" /><br class="clearfix"/>  
			</form>
		<?php
			require_once "php/felhasznalo.php";
			if (isset($_POST['submit-button'])) {
				regisztracio();
			}
		?>
        </div>

            <div id="side2" class="sidebars pull-right">
            	
            </div>

            <?php include "footer.php"; ?>