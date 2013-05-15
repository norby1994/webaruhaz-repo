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
	// termék adatainak lekérdezése
	$stid = oci_parse($connect, "SELECT * FROM termek WHERE termek_id = '$pid'");
	if (!$stid) {
		$e = oci_error($connect);
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	// Lekérdezés
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
	// termékek lekérdezése
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

/*
 * Hasonló, egy kategóriába tartozó termékek kilistázása
 */
function list_similar($id){
	global $connect;
	// termékek lekérdezése
	$stid = oci_parse($connect, "SELECT termek_id, termek_nev FROM termek WHERE kategoria_id = '$id' ORDER BY termek_nev ASC");
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
	print '<ul id="similar">';
	
	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
		print "<li>\n";
			print '<a href="/netshop/product-profil.php?pid=' . $row['TERMEK_ID'] . '">' . $row['TERMEK_NEV'] . '</a>';
		print "</li>\n";
	}
	print "</ul>\n";

	oci_free_statement($stid);
	oci_close($connect);			
               
}

/*
 * Termékekre való keresést megvalósító függvény
 */
function search($term){
	global $connect;
	// termékek lekérdezése !!!NEM TRIVIÁLIS LEKÉRDEZÉS!!!
	$stid = oci_parse($connect, "SELECT termek_id, termek_nev, termek_kep, rovid_leiras, ar, kategoria.kategoria_id, kategoria.kategoria_nev
									FROM termek 
									INNER JOIN kategoria ON termek.kategoria_id=kategoria.kategoria_id 
									WHERE termek_nev LIKE '%$term%' 
									ORDER BY termek.termek_nev");
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
	
	while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)): ?>
		<div class="search-box">
			 <div class="search-title">
				 <a href="/netshop/product-profil.php?pid=<?php echo $row['TERMEK_ID']; ?>"><img src="/netshop/<?php echo $row['TERMEK_KEP']; ?>" class="pp-img" alt="<?php echo iconv('ISO-8859-1', 'UTF-8', $row['TERMEK_NEV']); ?>"  /></a><br />
			 	<a href="/netshop/product-profil.php?pid=<?php echo $row['TERMEK_ID']; ?>"><?php echo iconv("ISO-8859-1", "UTF-8", $row['TERMEK_NEV']); ?></a>
			 </div>
			 <div class="search-info">
			 	<div class="search-category">
			 		<a href="/netshop/category_view.php?id=<?php echo $row['KATEGORIA_ID']; ?>"><?php echo $row['KATEGORIA_NEV']; ?></a>
			 	</div>
			 	<div class="search-short">
			 		<p><?php echo iconv("ISO-8859-1", "UTF-8", $row['ROVID_LEIRAS']); ?></p>
			 	</div>
			 	<div class="search-price">
			 		<?php echo $row['AR']; ?> Ft <a href="php/cart.php?add_id=<?php echo $row['TERMEK_ID']; ?>"><img src="/netshop/img/cart.png" alt="Kosárba tesz!" /></a>
			 	</div>
			 </div>
			 <br class="clearfix" />
		</div>
	
	<?php 
	endwhile;
	
	oci_free_statement($stid);
	oci_close($connect);			
               
}

?>