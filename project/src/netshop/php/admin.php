<?php
/**
 * Admin bejelentkeztetését és a
 * Session lekezelését elvégző metódus
 */
function login_check() {
	session_start();
	require_once "../php/connection.php";

	if (!$_POST["email"] || !$_POST["jelszo"]) {
		$errorMessage = "Nem adtad meg az emailt/jelszot!";
		header("location:../login.php?Error=" . $errorMessage);
	} else {
		$email = $_POST["email"];
		$jelszo = $_POST["jelszo"];
		$tbl_name = "felhasznalo";
		$sql = oci_parse($connect, "select * from admin where email = '" . addslashes($_POST["email"]) . "' and jelszo = '" . addslashes($_POST["jelszo"]) . "'");

		oci_execute($sql);
		while ($row = oci_fetch_array($sql, OCI_BOTH)) {
			$_SESSION["email"] = $row[0];
			$_SESSION["nev"] = $row[2];
			$_SESSION["szul_ido"] = $row[3];
			$_SESSION["telefon"] = $row[5];
			$_SESSION["reg_datum"] = $row[6];

		}

		if ($_SESSION["email"]) {
			$tipus = "admin";
			$_SESSION["tipus"] = $tipus;
			header("Location:../profile.php");
		}
	}

}

/**
 * Session vizsgálata:
 * 	- ha nincs email session, akkor visszaküldjük a login oldalra
 * 	- ha a felhasználó session van belőve, akkor a főoldalra küldjük vissza
 * 
 * Ez azért kell, hogy sima felhasználó ne láthassa az admin backendjéhez
 * tartozó dolgokat
 */
function session_check() {

	session_start();
	if (!$_SESSION['email']) {
		header("location:login.php");
	}

	if ($_SESSION['tipus'] == "felhasznalo") {
		header("location:../profil.php");
	}
}
?>