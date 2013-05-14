<?php

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['id']) && logged_in()) {
	addtocart($$_GET['id']);
}

function viewcart() {
	
}

function addtocart($id) {
	
}

function removefromcart() {
	
}

function clearcart() {
	
}

?>