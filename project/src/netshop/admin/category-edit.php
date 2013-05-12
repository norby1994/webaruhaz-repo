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
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>
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
              
            </div>
            
            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Kategória módosítás</h2>

                <?php require_once '../php/connection.php';
	// Rendelések lekérdezése
	$stid = oci_parse($connect, 'SELECT  kategoria_nev FROM kategoria');
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	// Lekérdezés
	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentites($e['message'], ENT_QUOTES), E_USER_ERROR);

	}
	print "<table id='tablazat'>\n";
	print "<tr>\n";
	print "<th>Kategória név</th>\n";
	print "</tr>\n";

	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		print "<tr>\n";
		foreach ($row as $item) {
			print "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
			print "<td><b> <a href='admin_edit.php?id=". $item ."'>Módosít</a></b></td>";
			print "<td><b> <a href='admin_delete.php?id=". $item ."'>Töröl</a></b></td>";
		}
		print "</tr>\n";
	}
	print "</table>\n";
                 
				if (isset($_POST['modosit'])) {
					data_update();
				}
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>

            