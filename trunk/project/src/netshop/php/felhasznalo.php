<?php

require_once "connection.php";

function regisztracio() {
	if (isset($_POST['submit-button'])) {
		// Felhasznalo tábla
		$nev = $_POST['nev'];
		$nem = $_POST['nem'];
		$szul_ido = $_POST['ev'] . '/' . $_POST['ho'] . '/' . $_POST['nap'];
		$telefon = $_POST['telefon'];
		$email = $_POST['email'];
		$jelszo = $_POST['jelszo'];
		
		// Lakcim tábla
		$ir_szam = $_POST['ir_szam'];
		$varos = $_POST['varos'];
		$utca = $_POST['utca'];
		$hazszam = $_POST['hazszam'];
		
		// Van-e már ilyen email cím?
		$vQ = ($connect, "SELECT email FROM felhasznalo WHERE email = $email");
		// $vR = oci_execute($vQ);
		if (oci_fetch_array($vQ, OCI_ASSOC+OCI_RETURN_NULLS)) {
			echo "lószar a picsádba";
			return -1;
		}
		
		// Felhasználó beszúrása
		/*
		$sql = 'INSERT INTO URL(Url_ID,Url_Name,Anchor_Text,Description) '.
       'VALUES(9, :url, :anchor, :description)';

		$compiled = oci_parse($db, $sql);

		oci_bind_by_name($compiled, ':url', $url_name);
		oci_bind_by_name($compiled, ':anchor', $anchor_text);
		oci_bind_by_name($compiled, ':description', $description);

		oci_execute($compiled);	
		*/
		$bQ = ($connect, "INSERT INTO felhasznalo(email, jelszo, felhasznalo_nev, szuld_ido, nem, telefon, reg_datum) VALUES ($email, $jelszo, $nev, to_date($szul_ido, yyyy/mm/dd), $nem, $telefon, CURRENT_TIMESTAMP)");
		if (oci_execute($bQ)) {
			echo 'Sikeres feltöltés';
		}
	}
}

?>