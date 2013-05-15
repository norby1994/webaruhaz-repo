<?php

session_start();

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['add_id']) && logged_in()) {
	addtocart($_GET['add_id']);
} else if (isset($_GET['remove_id']) && logged_in()) {
	removefromcart($_GET['remove_id']);
} else if (isset($_GET['shopping']) == true && logged_in()) {
	checkout();
} else {
	echo '<script type="text/javascript">
			alert("Kérlek jelentkezz be.");
			window.location.href="../login.php";</script>';
}

function checkout() {
	global $connect;
	
	$ossz_ar = 0;
	
	foreach ($_SESSION['cart']['items'] as $key => $value) {
		$ossz_ar += $value['ar'];
	}
	
	$fsql = 'INSERT INTO rendeles(email, idopont, ossz_ar)' . ' VALUES (:email, SYSDATE, :ossz_ar)';
	$bQ = oci_parse($connect, $fsql);

	oci_bind_by_name($bQ, ':email', $_SESSION['email']);
	oci_bind_by_name($bQ, ':ossz_ar', $ossz_ar);
	if (oci_execute($bQ)) {
		clearcart();
		$_SESSION['cart']['items'] = array();
		echo '<script type="text/javascript">window.location.href="../index.php";</script>';
	}
}

/*
 * Termék bevásárlókocsiba rakását elvégző metódus
 */
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

/*
 * Termék törlése a bevásárlókocsiból
 */
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