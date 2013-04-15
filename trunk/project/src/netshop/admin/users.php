<?php require_once "../php/session.php"; ?>
<?php require_once "../php/connection.php"; ?>
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
			
        	<?php require_once "admin-menu.php" ?>

            <div id="core" class="users pull-left">
                <h2 class="pull-center">Regisztrált Felhasználók</h2>

            <?php 
            
				// Felhasználók lekérdezése
				$stid = oci_parse($connect,
				'SELECT email, felhasznalo_nev, telefon, egyenleg, torzsvasarlo, reg_datum 
				 FROM felhasznalo');
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
				print "<table>\n";
				print "<tr>\n";
				print "<th>Email cím</th>\n";
				print "<th>Név</th>\n";
				print "<th>Telefonszám</th>\n";
				print "<th>Egyenleg</th>\n";
				print "<th>Törzsvásárló?</th>\n";
				print "<th>Regisztráció dátuma</th>\n";
				print "</tr>\n";
				
				while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
					print "<tr>\n";
					foreach ($row as $item) {
						print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
					}
					print "</tr>\n";
				}
				print "</table>\n";

				oci_free_statement($stid);
				oci_close($connect);
                ?>
            </div>

            <?php include "../footer.php"; ?>
