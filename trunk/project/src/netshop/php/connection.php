<?php

	$FELHASZNALONEV = 'kacrabt';
	$JELSZO = 'h956824';
	$HOST = 'localhost/XE';
	
	$connect = oci_connect($FELHASZNALONEV, $JELSZO, $HOST);
	
	if (!$connect) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	} 
?>