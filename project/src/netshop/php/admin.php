<?php
/**
 * Admin bejelentkeztetését és a
 * Session lekezelését elvégző metódus
 */
function login_check() { 
	// error_reporting(E_ERROR);
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
		} else {
			echo '<script type="text/javascript">
			alert("Hibás email/jelszó ");
			window.location.href="../admin/login.php";</script>';	
		}
	}

}
/**
 * Regisztráció törléése
 */
function regtorles() {
	require_once "connection.php";
	$sql = "DELETE FROM admin WHERE email = '" . $_SESSION['email'] . "'";
	$bQ = oci_parse($connect, $sql);
	if (oci_execute($bQ)) {
		echo "<script>alert('Regisztráció törölve!'); window.location = '../logout.php';</script>";
		//header("../logout.php");
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

/**
 * Vásárlások kilistázását megvalósító metódus
 */
function list_rendeles() {
	// adatbázis kapcsolódás
	require_once '../php/connection.php';
	// Rendelések lekérdezése
	$stid = oci_parse($connect, 'SELECT rendeles_id, email, idopont, ossz_ar FROM rendeles');
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
	print "<th>Rendeles_id</th>\n";
	print "<th>Email</th>\n";
	print "<th>Időpont</th>\n";
	print "<th>Össz ár</th>\n";
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

}

/**
 * Katalógus termékeinek listázása
 */
function list_termekek() {
	// adatbázis kapcsolódás
	require_once '../php/connection.php';
	// Rendelések lekérdezése
	$stid = oci_parse($connect, 'SELECT termek_nev, rovid_leiras, hosszu_leiras, ar, darab_szam FROM termek');
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
	print "<th>Termék név</th>\n";
	print "<th>Rövid leírás</th>\n";
	print "<th>Hosszú leírás</th>\n";
	print "<th>Ár</th>\n";
	print "<th>Darab szám</th>\n";
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

}

/**
 * Felhasználók kilistázását megvalósító metódus
 */
function list_users() {
	// Felhasználók lekérdezése
	require_once "../php/connection.php";
	$stid = oci_parse($connect, 'SELECT email, felhasznalo_nev, telefon, egyenleg, torzsvasarlo, reg_datum 
				 FROM felhasznalo');
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	// lekérdezés logikájának ellenőrzése
	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	// lekérdezés kilistázása
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

}

function data_update_populate($email) {
	// admin adatok frissítése
	require_once "../php/connection.php";
	$stid = oci_parse($connect, "SELECT email, admin_nev, telefon, szul_ido FROM admin
						WHERE email = '$email'");
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	// lekérdezés logikájának ellenőrzése
	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	// lekérdezés kilistázása

	$res = oci_fetch_array($stid);

	oci_free_statement($stid);
	oci_close($connect);
	return $res;
}

function data_update() {
	if (isset($_POST['modosit'])) {
		require "connection.php";

		// Admin tábla
		$nev = $_POST['admin_nev'];
		$email = $_POST['email'];
		$szul_ido = $_POST['szul_ido'];
		$telefon = $_POST['telefon'];
		$jelszo = $_POST['jelszo'];
		$jelszo2 = $_POST['jelszo2'];

		$azon = $_SESSION['email'];
		$mess = '';

		// jelszó ellenőrzés és frissítése
		if ($jelszo != $jelszo2) {
			echo "A jelszavak nem egyeznek!";
			header('Location:../admin/update.php');
		} else if ($jelszo == $jelszo2 && $jelszo != null) {
			$fsql = "UPDATE admin SET jelszo='" . $jelszo . "' WHERE email = '" . $azon . "'";
			$bQ = oci_parse($connect, $fsql);
			if (oci_execute($bQ)) {
				$mess = $mess. 'jelszó / ';
			}
		}

		// név frissítése
		if ($nev != null) {
			$fsql = "UPDATE admin SET admin_nev='" . $nev . "' WHERE email = '" . $azon . "'";
			$bQ = oci_parse($connect, $fsql);
			if (oci_execute($bQ)) {
				$mess = $mess. 'név / ';
			}
			$_SESSION['nev'] = $nev;
		}

		// email frissítése
		if ($email != null) {
			$fsql = "UPDATE admin SET email='" . $email . "' WHERE email = '" . $azon . "'";
			$bQ = oci_parse($connect, $fsql);
			if (oci_execute($bQ)) {
				$mess = $mess. 'email / ';
			}

			$_SESSION['email'] = $email;
		}

		// szul_ido frissítése
		if ($szul_ido != null) {
			if (!strpos($szul_ido, '.') && strlen($szul_ido) != 10) {
				echo "Hibás dátumformátum";
				return;
			} else {
				$fsql = "UPDATE admin SET szul_ido=to_date('" . $szul_ido . "', 'yyyy.mm.dd.') WHERE email = '" . $azon . "'";
				$bQ = oci_parse($connect, $fsql);
				if (oci_execute($bQ)) {
					$mess = $mess. 'születési dátum / ';
				}

				$_SESSION['szul_ido'] = $szul_ido;
			}
		}

		// telefon frissítése
		if ($telefon != null) {
			$fsql = "UPDATE admin SET telefon='" . $telefon . "' WHERE email = '" . $azon . "'";
			$bQ = oci_parse($connect, $fsql);
			if (oci_execute($bQ)) {
				$mess = $mess. 'telefonszám / ';
			}
			$_SESSION['telefon'] = $telefon;
		}
		
		
		oci_close($connect);
		echo '<script type="text/javascript">
			alert("A következő adatok frissítve lettek ' . $mess . ' .");
			window.location.href="../profile.php";</script>';
	}
}
?>