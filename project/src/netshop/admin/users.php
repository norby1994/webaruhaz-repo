<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin - Felhasználók kilistázása</title>
        <meta name="description" content="Internetes áruház" />
        <meta name="author" content="Kasziba Szintia, Verebélyi Bertalan, Verebélyi Csaba" />
        <link rel="shortcut icon" href="../img/favicon.png" />
        <link rel="stylesheet" href="../css/reset.css" />
        <link rel="stylesheet" href="../css/style.css" />

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->

    </head>

    <body>
	    <?php
		/**
		 * session ellenőrzés elvégzése, hogy illetéktelen 
		 * nem admin felhasználók ne nézhessék meg ennek az oldalnak a tartalmát	
		 */ 
		require_once "../php/admin.php";
		session_check();
						    		 
	    ?>
		<div id="wrapper">
			
        	<?php require_once "admin-menu.php" ?>

            <div id="core" class="users pull-left">
                <h2 class="pull-center">Regisztrált Felhasználók</h2>

            <?php list_users(); ?>
            </div>

            <?php include "../footer.php"; ?>
