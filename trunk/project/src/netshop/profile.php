<?php  ?>
<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Felhasználói profil</title>
        <meta name="description" content="Internetes áruház" />
        <meta name="author" content="Kasziba Szintia, Verebélyi Bertalan, Verebélyi Csaba" />
        <link rel="shortcut icon" href="img/favicon.png" />
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->

    </head>

    <body>
    <?php
    
    session_start();
    if(!$_SESSION['email']){
	    	header("location:login.php");
	    }
	
	// Ha admin típusú a bejelentkezett felhasználó,
	// akkor megjelenítjük a hozzá tartozó profilt
    if($_SESSION['tipus'] =="admin"){
    		 
    ?>

        <div id="wrapper">
           <?php require_once "admin/admin-menu.php" ?>

            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Profil adatok</h2>

                <div class="acc-row">
                    <span class="acc-info">Regisztráció dátuma: </span><span class="acc-data"><?php echo $_SESSION["reg_datum"];?></span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Felhasznaló név:</span><span class="acc-data"><?php echo $_SESSION["nev"];?></span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Email:</span><span class="acc-data"><?php echo $_SESSION["email"];?></span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Születési dátum:</span><span class="acc-data"><?php echo $_SESSION["szul_ido"];?></span>
                </div>
                <br class="clearfix" />

                <form action="" method="POST" class="modosit">
                    <input type="submit" value="Módosít" name="modosit" />
                </form>
            </div>

            <div id="side2" class="sidebars pull-right">
                <h3>Legutóbbi vásárlások</h3>
            </div>
                    <?php 	// Ha felhasználó típusú a bejelentkezett felhasználó,
							// akkor megjelenítjük a hozzá tartozó profilt
							
							} else if( 
                    		$_SESSION['tipus']=="felhasznalo"){ ?>
		<div id="wrapper">
		<?php require_once "template/felhasznalo-menu.php" ?>
		
        <div id="core" class="profile pull-left">
			<h2 class="pull-center">Profil beállítások</h2>
				
				<div class="acc-row"><span class="acc-info">Regisztráció dátuma</span> <span class="acc-data"><?php echo $_SESSION["reg_datum"]; ?></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Státusz: </span> <span class="acc-data"><?php echo $_SESSION["torzsvasarlo"];?></span></div>
				<br class="clearfix" />		
				
				<div class="acc-row"><span class="acc-info">Felhasznaló név:</span> <span class="acc-data"><?php echo $_SESSION["nev"]; ?></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Email:</span> <span class="acc-data"><?php echo $_SESSION["email"]; ?></span></div>			
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Születési dátum:</span> <span class="acc-data"><?php echo $_SESSION["szul_ido"]; ?></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Lakcím:</span> <span class="acc-data"></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Telefon:</span> <span class="acc-data"><?php echo $_SESSION["telefon"]; ?></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Egyenleg:</span> <span class="acc-data"><?php echo $_SESSION["egyenleg"]; ?></span></div>
				<br class="clearfix" />
				
								
				<form action="" method="POST" class="modosit">
					<input type="submit" value="Módosít" name="modosit" />
				</form>
				
        </div>
		
		<div id="side2" class="sidebars pull-right">
			<h3>Kosár</h3>
		</div>

        <?php 
}
        include "footer.php"; 
        
        
        ?>
