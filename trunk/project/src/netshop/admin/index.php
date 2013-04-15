<?php include "../php/connection.php"; ?>
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
            <header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="index.html">NetShop</a></h1>

                <div id="kijelentkezes">
                    <a href="logout.php">Kijelentkezés</a>
                </div>

                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a rel="external" href="#">Termék feltöltése</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Termék módosítása</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória felvétele</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória módosítása</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Katalógus megtekintése</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

            <div id="side" class="sidebars pull-left">
                <h3>Menü</h3>
                <nav>
                    <ul>
                        <li class="menu-head">
                            Profil Beállítások
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="#">Kijelentkezés</a>
                                </li>
                                <li>
                                    <a href="#">Adatok módosítása</a>
                                </li>
                                <li>
                                    <a href="#">Regisztráció törlése</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-head">
                            Admin funkciók
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="#">Éves statisztika</a>
                                </li>
                                <li>
                                    <a href="#">Vásárlások listázása</a>
                                </li>
                                <li>
                                    <a href="#">Felhasználók kezelése</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

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
