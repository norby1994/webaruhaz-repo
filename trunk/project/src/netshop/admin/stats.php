<!doctype html>
<html lang="hu">
<head>
<meta charset="utf-8">
<title>NetShop - Admin | Éves statisztika</title>
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

<?php /**
	 * session ellenőrzés elvégzése, hogy illetéktelen
	 * nem admin felhasználók ne nézhessék meg ennek az oldalnak a tartalmát
	 */
	require_once "../php/admin.php";
	session_check();
?>
<div id="wrapper">

<?php require_once "../template/admin-menu.php" ?>

<div id="core" class="admin-full pull-left">
<h2 class="pull-center">Éves statisztika</h2>
<form action="" method="post" >
<input type="submit" name="bevetel-submit" value="Összbevétel lekér" />
<input type="submit" name="regisztralok-submit" value="Regisztrálók lekér" />
<input type="submit" name="lakohely-submit" value="Lakóhely szerint lekér" />
<?php 
require_once "../php/admin.php";

if (isset($_POST['bevetel-submit'])) {
	bevetel_stat();
}
if (isset($_POST['regisztralok-submit'])) {
	regisztracio_stat();
}

if (isset($_POST['lakohely-submit'])) {
	lakohely_stat();
}

?>
</form>
</div>

<?php
include "../footer.php";
?>