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
                                    <a href="../logout.php">Kijelentkezés</a>
                                </li>
                                <li>
                                    <a href="update.php">Adatok módosítása</a>
                                </li>
                                <li>
                                    <a href="delete.php">Regisztráció törlése</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-head">
                            Admin funkciók
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="stats.php">Éves statisztika</a>
                                </li>
                                <li>
                                    <a href="orders.php">Vásárlások listázása</a>
                                </li>
                                <li>
                                    <a href="users.php">Felhasználók kezelése</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

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