<?php

session_start();

require_once 'connection.php';
require_once 'felhasznalo.php';

if (isset($_GET['add_id']) && logged_in()) {
	addtocart($_GET['add_id']);
} else {
	echo '<script type="text/javascript">
			alert("Kérlek jelentkezz be.");
			window.location.href="../login.php";</script>';
}

function viewcart() {
	
}

function addtocart($id) {
	$_SESSION['cart']['items'] = $id;
	print_r($_SESSION['cart']);
	echo '<string type="text/javascript">
			window.location.href="../cartview.php";
			</script>';
}

function removefromcart($id) {
	unset ($_SESSION['cart']);
}

function clearcart() {
	
}

?>