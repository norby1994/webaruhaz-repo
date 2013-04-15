<?php

	$FELHASZNALONEV = 'threldar';
	$JELSZO = 'threldar';
	$HOST = 'xe';
	
	$connect = oci_connect($FELHASZNALONEV, $JELSZO, $HOST);
	
	if (!$connect) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
?>