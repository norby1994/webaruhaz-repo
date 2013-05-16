<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin | Kategóriák módosítása</title>
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
            
            <div id="core" class="admin-full pull-left">
                <h2 class="pull-center">Kategória módosítás</h2>

                <?php require_once '../php/connection.php';
	// Rendelések lekérdezése
	$stid = oci_parse($connect, 'SELECT * FROM kategoria');
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
	print "<th>Művelet</th>\n";
	print "</tr>\n";
$i = 0;
	while ($row = oci_fetch_array($stid)):
echo "<tr><td>" . htmlentities($row["KATEGORIA_NEV"]) . "</td>";
$kat_nev = $row["KATEGORIA_NEV"];

?>		
<td>
	<form name="modosit" action="admin_edit.php" method="GET">
		<input type="hidden" name="edit" value="<?php echo $kat_nev; ?>"/>
		<input type="submit" name="modosit" value="Módosít"/>
	</form>
</td>
		
			  
		<?php 	
		endwhile;
		
	
	print "</table>\n";
                 
				
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>

        <?php
		include "../footer.php";
        ?>
            