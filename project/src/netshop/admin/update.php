<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin | Adatok módosítása</title>
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
			<header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="/netshop/index.php"><img src="/netshop/img/header.png" alt="Netshop" /></a></h1>
                <div id="bejelentkezes" class="headerbar-form pull-right">
					<ul>
		                    <li><a href="../logout.php">Kijelentkezés</a></li>
					</ul>
				</div>
                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a href="product.php">Termék feltöltése</a>
                        </li>
                        <li>
                            <a href="product-edit.php">Termék módosítása</a>
                        </li>
                        <li>
                            <a href="category.php">Kategória felvétele</a>
                        </li>
                        <li>
                            <a href="category-edit.php">Kategória módosítása</a>
                        </li>
                        <li>
                            <a href="catalog.php">Katalógus megtekintése</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

            <div id="side" class="sidebars pull-left">
            	<h3>Menü</h3>
              <nav>
                    <ul>
                        <li>
                            <a href="/netshop/profile.php">Vissza</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Profil módosítások</h2>

                <?php $data = data_update_populate($_SESSION["email"]); ?>
                <p>
                    Az adatok módosításához, csak azt a mezőt kell kitölteni, amelyiken változtatni szeretnél.<br />
                    <br />
                    Születési dátum megadásához használd az alábbi formátumot: ÉÉÉÉ.HH.NN (pl.: 1990.05.12.).
                </p>
                <br class="clearfix" />
				<form action="" method="POST" class="modosit">
                <div class="acc-row">
                    <span class="acc-info"><label for="nev">Admin név:</label></span><span class="acc-datam">
                        <input type="text" placeholder="<?php echo $data['ADMIN_NEV']; ?>" name="admin_nev" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="email">Email:</label></span><span class="acc-datam">
                        <input type="email" placeholder="<?php echo $data['EMAIL']; ?>" name="email" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="ev">Születési dátum:</label></span><span class="acc-datam">
                        <input type="text" name="szul_ido" placeholder="<?php echo $data['SZUL_IDO']; ?>" />
                    </span>
                </div>

                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="telefon">Telefon:</label></span><span class="acc-datam">
                        <input type="text" name="telefon" placeholder="<?php echo $data['TELEFON']; ?>" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="jelszo">Új jelszó:</label></span><span class="acc-datam">
                        <input type="password" name="jelszo" placeholder="**********" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="jelszo2">Jelszó mégegyszer:</label></span><span class="acc-datam">
                        <input type="password" name="jelszo2" placeholder="**********" />
                    </span>
                </div>
                <br class="clearfix" />

                    <input type="submit" value="Módosít" class="pull-center" name="modosit" />
                </form>

                <?php
				
				if (isset($_POST['modosit'])) {
					data_update();
				}
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>

            <?php
	include "../footer.php";
            ?>
