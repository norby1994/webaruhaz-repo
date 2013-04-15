<?php
	include '../php/admin.php';

	if(!isset($_SESSION['admin'])){
		header("location:../index.php");
		exit;
	} else {
		delete();
	}
?>