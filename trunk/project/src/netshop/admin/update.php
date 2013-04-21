<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin adatok módosítása</title>
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
			require_once "../php/admin.php";
			session_check();
		?>

        <div id="wrapper">
            
            <?php require_once "admin-menu.php" ?>

            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Profil módosítások</h2>

                <div class="acc-row">
                    <span class="acc-info"><label for="nev">Admin név:</label></span><span class="acc-datam">
                        <input type="text" placeholder="Kun Béla" name="admin_nev" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="email">Email:</label></span><span class="acc-datam">
                        <input type="text" placeholder="kun.bela@gmail.com" name="email" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Születési dátum:</span>
                    <br />

                    <div class="acc-datam">
                        <label for="ev">Év:</label>
                        <input type="text" name="ev" placeholder="1990" />
                        <br class="clearfix"/>
                        <label for="honap">Hónap:</label>
                        <input type="text" name="honap" placeholder="AUG" />
                        <br class="clearfix"/>
                        <label for="nap">Nap:</label>
                        <input type="text" name="nap" class="pull-right" placeholder="08" />
                        <br class="clearfix"/>
                    </div>
                </div>
                <br class="clearfix" />
                
                <div class="acc-row">
                	<label for="nem" class="pull-left">Nem:</label>
						<div class="pull-right"><input type="radio" name="nem" value="1" required="required" /> Férfi <input type="radio" name="nem" value="0" required="required" /> Nő</div><br class="clearfix"/>
				</div>
				<br class="clearfix" />
                
                <div class="acc-row">
                    <span class="acc-info"><label for="telefon">Telefon:</label></span><span class="acc-datam">
                        <input type="text" name="telefon" placeholder="06706664545" />
                    </span>
                </div>
                <br class="clearfix" />

                <form action="" method="POST" class="modosit">
                    <input type="submit" value="Módosít" class="pull-center" name="modosit" />
                </form>

            </div>

            <div id="side2" class="sidebars pull-right">
                <h3>Legutóbbi vásárlások</h3>
            </div>

            <?php include "../footer.php"; ?>