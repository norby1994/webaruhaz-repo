<?php
session_start();
$FELHASZNALONEV = 'kacrabt';
	$JELSZO = 'h956824';
	$HOST = 'localhost';
	
	$connect = oci_connect($FELHASZNALONEV, $JELSZO, $HOST);
	
	if (!$connect) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}


if(!$_POST["email"] || !$_POST["jelszo"])
	{
		$errorMessage = "Nem adtad meg az emailt/jelszot!";
		header("location:../login.php?Error=" .$errorMessage);
	}else{
		$email=$_POST["email"];
		$jelszo=$_POST["jelszo"];
		$tbl_name="felhasznalo";
		$sql=oci_parse($connect,"select * from felhasznalo where email = '".addslashes($_POST["email"])."' and jelszo = '".addslashes($_POST["jelszo"])."'");
		
		oci_execute($sql);
		while ($row = oci_fetch_array($sql, OCI_BOTH )) {
			$_SESSION["email"] = $row[0];
			$_SESSION["felhasznalo_nev"] = $row[2];
			$_SESSION["szul_ido"] = $row[3];
			$_SESSION["telefon"] = $row[5];
			$_SESSION["egyenleg"] = $row[6];
			$_SESSION["reg_datum"] = $row[7];
			$_SESSION["torzsvasarlo"] = $row[8];
			
			
		}
		
		if($_SESSION["email"]) {
		header("Location:../profile.php");
	}}


?>