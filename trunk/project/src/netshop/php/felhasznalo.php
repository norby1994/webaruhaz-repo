<?php

/**
 * Felhasználó regisztrációt megvalósító metódus
 */
function regisztracio() {
	if (isset($_POST['submit-button'])) {
		require_once "connection.php";

		// Felhasznalo tábla
		$nev = $_POST['nev'];
		$nem = $_POST['nem'];
		$szul_ido = $_POST['ev'] . '/' . $_POST['honap'] . '/' . $_POST['nap'];
		$telefon = $_POST['telefon'];
		$email = $_POST['email'];
		$jelszo = $_POST['jelszo'];

		// Lakcim tábla
		$ir_szam = $_POST['ir_szam'];
		$varos = $_POST['varos'];
		$utca = $_POST['utca'];
		$hazszam = $_POST['hazszam'];

		// Van-e már ilyen email cím?
		$vQ = oci_parse($connect, 'SELECT email FROM felhasznalo WHERE email = :email');
		oci_bind_by_name($vQ, ':email', $email);
		$vR = oci_execute($vQ);
		if (oci_fetch_array($vQ, OCI_ASSOC + OCI_RETURN_NULLS)) {
			echo "Ez az email cím már létezik az adatbázisban.";
			return -1;
		}

		// Felhasználó beszúrása
		$fsql = 'INSERT INTO felhasznalo(email, jelszo, felhasznalo_nev, szul_ido, nem, telefon, reg_datum)' . ' VALUES (:email, :jelszo, :nev, to_date(:szul_ido, \'yyyy/mm/dd\'), :nem, :telefon, CURRENT_TIMESTAMP)';
		$bQ = oci_parse($connect, $fsql);

		// Debug???
		echo "$email\n$jelszo\n$nev\n$szul_ido\n$nem\n$telefon";

		oci_bind_by_name($bQ, ':email', $email);
		oci_bind_by_name($bQ, ':jelszo', $jelszo);
		oci_bind_by_name($bQ, ':nev', $nev);
		oci_bind_by_name($bQ, ':szul_ido', $szul_ido);
		oci_bind_by_name($bQ, ':nem', $nem);
		oci_bind_by_name($bQ, ':telefon', $telefon);
		if (oci_execute($bQ)) {
			echo 'Sikeres feltöltés';
		}
	}
}

function regtorles() {
	require_once "connection.php";
	$sql = "DELETE FROM felhasznalo WHERE email = '" . $_SESSION['email'] ."'";
	$bQ = oci_parse($connect, $sql);
	if (oci_execute($bQ)) {
		echo "<script>alert('Regisztráció törölve!'); window.location = 'logout.php';</script>";
		//header("../logout.php");
	}
}

/**
 * Felhasználó bejelentkeztetését és a
 * Session lekezelését elvégző metódus
 */
function login_check() {
	session_start();
	require_once "php/connection.php";

	if (!$_POST["email"] || !$_POST["jelszo"]) {
		$errorMessage = "Nem adtad meg az emailt/jelszot!";
		header("location:../login.php?Error=" . $errorMessage);
	} else {
		$email = $_POST["email"];
		$jelszo = $_POST["jelszo"];
		$tbl_name = "felhasznalo";
		$sql = oci_parse($connect, "select * from felhasznalo where email = '" . addslashes($_POST["email"]) . "' and jelszo = '" . addslashes($_POST["jelszo"]) . "'");

		oci_execute($sql);
		while ($row = oci_fetch_array($sql, OCI_BOTH)) {
			$_SESSION['email'] = $row[0];
			$_SESSION['nev'] = $row[2];
			$_SESSION['szul_ido'] = $row[3];
			$_SESSION['telefon'] = $row[5];
			$_SESSION['egyenleg'] = $row[6];
			$_SESSION['reg_datum'] = $row[7];
			$_SESSION['torzsvasarlo'] = $row[8];

		}

		if ($_SESSION['email']) {
			$tipus = "felhasznalo";
			$_SESSION['tipus'] = $tipus;
			header("Location:profile.php");
		} else {
			echo '<script type="text/javascript">
			alert("Hibás email/jelszó ");
			window.location.href="/netshop/login.php";</script>';
		}
	}

}

/**
 * Ha a session fut és a session admin, akkor
 * átirányítjuk a profil oldalára, mert az admin nem láthatja
 * a felhasználó backend részét
 */
function session_check() {

	session_start();
	if (!$_SESSION['email']) {
		header("location:login.php");
	}

	if ($_SESSION['tipus'] == "admin") {
		header("location:../profil.php");
	}
}
?>