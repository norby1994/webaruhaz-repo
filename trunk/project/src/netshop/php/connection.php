<?php
	session_start();

	$FELHASZNALONEV = 'h070183';
	$JELSZO = 'qwerty';
	$HOST = 'xe';
	
	$connect = oci_connect($FELHASZNALONEV, $JELSZO, $HOST);
	
	if (!$connect) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
?>