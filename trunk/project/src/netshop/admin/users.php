<?php include "../php/connection.php"; ?>
<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin - Felhasználók kilistázása</title>
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
                <h2 class="pull-center">Regisztrált Felhasználók</h2>

            <?php 
            
				// Felhasználók lekérdezése
				$stid = oci_parse($connect, 'SELECT * FROM departments');
				if (!$stid) {
					$e = oci_error($connect);
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}

				// Perform the logic of the query
				$r = oci_execute($stid);
				if (!$r) {
					$e = oci_error($stid);
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				}

				// Fetch the results of the query
				print "<table border='1'>\n";
				while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
					print "<tr>\n";
					foreach ($row as $item) {
						print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
					}
					print "</tr>\n";
				}
				print "</table>\n";

				oci_free_statement($stid);
				oci_close($conn);
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">
                <h3>Legutóbbi vásárlások</h3>
            </div>

            <?php include "../footer.php"; ?>
