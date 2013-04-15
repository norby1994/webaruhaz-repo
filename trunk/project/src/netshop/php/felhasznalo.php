<?php

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
		$fsql = 'INSERT INTO felhasznalo(email, jelszo, felhasznalo_nev, szuld_ido, nem, telefon, reg_datum)' 
			. ' VALUES (:email, :jelszo, :nev, to_date(:szul_ido, yyyy/mm/dd), :nem, :telefon, CURRENT_TIMESTAMP)';
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
?>