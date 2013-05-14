<?php
/*
 * termékes dolgokért felel
 */

require_once "connection.php";

/*
 * Termék profil oldal adatainak lekérdezése
 */
function product_info($pid){
	global $connect;
	$stid = oci_parse($connect, "SELECT * FROM termek WHERE termek_id = '$pid'");
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	$r = oci_execute($stid);
	if (!$r) {
		$e = oci_error($stid);
		trigger_error(htmlentities($e['message'], ENT_QUOTES, "UTF-8"), E_USER_ERROR);
	}

	$row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);


	oci_free_statement($stid);
	oci_close($connect);
	
	return $row;
}


/*
 * Termékek kilistázása a 'Termék módosítása' menüponthoz
 */
function product_list(){
	global $connect;
	// Rendelések lekérdezése
	$stid = oci_parse($connect, 'SELECT termek_id, termek_nev, ar FROM termek');
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
	print "<table>\n";
	print "<tr>\n";
	print "<th>ID</th>\n";
	print "<th>Termék név</th>\n";
	print "<th>Ár</th>\n";
	print "<th>Művelet</th>\n";
	print "</tr>\n";
	
	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		print "<tr>\n";
			print "<td>" . $row['TERMEK_ID'] . "</td>";
			print "<td>" . iconv("ISO-8859-1", "UTF-8", $row['TERMEK_NEV']) . "</td>";
			print "<td>" . $row['AR'] . "</td>";
			print "<td>Szerkesztés</td>";
		print "</tr>\n";
	}
	print "</table>\n";

	oci_free_statement($stid);
	oci_close($connect);			
               
}

?>