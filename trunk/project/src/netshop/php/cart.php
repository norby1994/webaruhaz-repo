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
	$termek_szam = 0;
	$idopont = date('Y') . '/' . date('m') . '/' . date('d');
	
	foreach ($_SESSION['cart']['items'] as $key => $value) {
		$termek_szam++;
		$ossz_ar += $value['ar'];
	}
	
	$fsql = 'INSERT INTO rendeles(email, idopont, ossz_ar, termek_szam)' . ' VALUES (:email, to_date(:idopont, \'yyyy/mm/dd\'), :ossz_ar, :termek_szam)';
	$bQ = oci_parse($connect, $fsql);

	oci_bind_by_name($bQ, ':email', $_SESSION['email']);
	oci_bind_by_name($bQ, ':ossz_ar', $ossz_ar);
	oci_bind_by_name($bQ, ':idopont', $idopont);
	oci_bind_by_name($bQ, ':termek_szam', $termek_szam);
	
	$i = 0;
	
	$last = "SELECT * FROM rendeles WHERE rownum <= 1 ORDER BY rendeles_id DESC";
	$stid = oci_parse($connect, $last);
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	
	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	$row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
	
	print_r($row);
				
	foreach ($_SESSION['cart']['items'] as $key => $value) {
		$i++;
		$rs = 'UPDATE rendeles_reszletei set termek_id = ' . $value['id'] . ', darab_szam = 1, termek_ar = ' . $value['ar'] .' where rendeles_id = ' . $row['RENDELES_ID'] . ' AND termek_id = ' . $i;
		$rq = oci_parse($connect, $rs);
		oci_execute($rq);
	}
	
	if (oci_execute($bQ)) {
		clearcart();
		$_SESSION['cart']['items'] = array();
		//echo '<script type="text/javascript">window.location.href="../index.php";</script>';
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