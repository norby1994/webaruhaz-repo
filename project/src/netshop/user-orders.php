<?php session_start(); ?>
<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<title>NetShop - <?php echo $_GET['id']; ?>. kategória termékei</title>
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
				
				<div id="core" class="admin-full pull-left">
<h2 class="pull-center">Vásárolt termékek</h2>

<?php 


	// adatbázis kapcsolódás
	require_once '/php/connection.php';
	// Rendelések lekérdezése
	$stid = oci_parse($connect, "select termek_nev, ar from termek where termek_id = (select termek_id from rendeles_reszletei where rendeles_id = (Select rendeles_id from rendeles
where email ='peep@citromail.hu'))");
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
	print "<th>Termék neve</th>\n";
	print "<th>Ára</th>\n";
	print "</tr>\n";

	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		print "<tr>\n";
		foreach ($row as $item) {
			print "    <td>" . ($item !== null ? htmlentities(iconv("ISO-8859-1", "UTF-8", $item), ENT_QUOTES) : "&nbsp;") . "</td>\n";
		}
		print "</tr>\n";
	}
	print "</table>\n";

	oci_free_statement($stid);
	oci_close($connect);


?>

				<br class="clearfix" />

				
			</header>
			<br class="clearfix" />

			<div id="core" class="landing pull-left">
				
			</div>

			<?php
	include "footer.php";
 ?>
