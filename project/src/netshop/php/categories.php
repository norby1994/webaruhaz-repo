<?php
/**
 * kategóriás dolgokért felel
 */

/**
 * a kategóriákat jeleníti meg a menüben
 */
function category_menu() {
	require_once "connection.php";
	$stid = oci_parse($connect, 'SELECT * FROM kategoria');
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

	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		echo '<li><a href="category_view.php?id=' . $row['KATEGORIA_ID'] . '">' . $row['KATEGORIA_NEV'] . '</a></li>';
	}

	oci_free_statement($stid);
	oci_close($connect);
}

/**
 * kategory view-ban a kategóriához
 * tartozó termékek kilistázása
 */
function category_view($id) {
	require_once "connection.php";
	$stid = oci_parse($connect, 'SELECT * FROM termek WHERE kategoria_id = $id');
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		echo $row['TERMEK_NEV'];
	}

	oci_free_statement($stid);
	oci_close($connect);
}
?>