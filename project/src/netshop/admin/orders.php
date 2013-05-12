<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin Bejelentkezés</title>
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
    <header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>
               
     </header>
     <div id="core" class="profile pull-left">
                <h2 class="pull-center">Vásárlások listázása</h2>
                
<?php
	require_once "../php/admin.php";
	list_rendeles();
?>
</div>

<footer class="clearfix">
                <div id="foot-nav">
                    <a rel="external" href="../index.php">Főoldal</a>
                </div>
                <p>
                    Copyrigt © 2013
                </p>
            </footer>
<script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
</body>
</html>