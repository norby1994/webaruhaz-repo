<?php

session_start();

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['add_id']) && logged_in()) {
	addtocart($_GET['add_id']);
} else {
	echo '<script type="text/javascript">
			alert("Kérlek jelentkezz be.");
			window.location.href="../login.php";</script>';
}

function viewcart() {
	
}

function addtocart($id) {
	global $connect;
	
	$termek = "SELECT * FROM termek WHERE termek_id = '$id'";
	$stid = oci_parse($connect, $termek);
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
	
	//$row = oci_fetch($stid);
	
	//print_r($row);
	
	while ($row = oci_fetch_array($stid, OCI_BOTH)) {
		$data = array(
			'id' => $id,
			'nev' => $row['TERMEK_NEV'],
			'ar' => $row['AR'],
			'termek_kep' => $row['TERMEK_KEP']
		);
		
		$_SESSION['cart']['items'].push($data);
	}
		
	print_r($_SESSION['cart']);
	//echo '<script type="text/javascript">window.location.href="../cartview.php";</script>';
}

function removefromcart($id) {
	unset ($_SESSION['cart']);
}

function clearcart() {
	
}

?>