<?php

session_start();

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['add_id']) && logged_in()) {
	addtocart($_GET['add_id']);
} else if (isset($_GET['remove_id']) && logged_in()) {
	removefromcart($_GET['remove_id']);
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
	while ($row = oci_fetch_array($stid, OCI_BOTH)) {
		$data = array(
			'id' => $id,
			'nev' => $row['TERMEK_NEV'],
			'ar' => $row['AR'],
			'termek_kep' => $row['TERMEK_KEP']
		);
		
		array_push($_SESSION['cart']['items'], $data);
	}
	echo '<script type="text/javascript">window.location.href="../cartview.php";</script>';
}

function removefromcart($id) {
	foreach ($_SESSION['cart']['items'] as $key => $value) {
		if ($value['id'] == $id) {
			unset($_SESSION['cart']['items'][$key]);
			echo '<script type="text/javascript">window.location.href="../cartview.php";</script>';
		} else {
			
		}
	}
}

function clearcart() {
	unset ($_SESSION['cart']);
}

?>