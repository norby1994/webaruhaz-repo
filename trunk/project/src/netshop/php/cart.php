<?php

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['add_id']) && logged_in()) {
	addtocart($$_GET['id']);
} else {
	echo '<script type="text/javascript">
			alert("Kérlek jelentkezz be.");
			window.location.href="../login.php";</script>';
}

function viewcart() {
	
}

function addtocart($id) {
	$_SESSION['cart']['items'] = $id;
	echo '<string type="text/javascript">window.history.back();</script>';
}

function removefromcart($id) {
	unset ($_SESSION['cart']);
}

function clearcart() {
	
}

?>