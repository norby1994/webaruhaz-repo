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
    

        <div id="wrapper">
            <header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="index.html">NetShop</a></h1>
<?php
    
    session_start();
    if(!$_SESSION['email']){
	    	header("location:login.php");
	    	
	    }
	    
    ?>
                <div id="kijelentkezes">
                    <a href="logout.php">Kijelentkezés</a>
                </div>

                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a rel="external" href="#">Termék feltöltése</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Termék módosítása</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória felvétele</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória módosítása</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Katalógus megtekintése</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

                    <div id="side" class="sidebars pull-left">
			<h3>Menü</h3>
				<nav>  
					<ul>  
						<li class="menu-head">Profil adatok</li>
							<li>
								<ul class="inner">
									<li><a href="#">Kijelentkezés</a></li>
									<li><a href="#">Adatok módosítása</a></li>
									<li><a href="#">Regisztráció törlése</a></li>
								</ul>
							</li>
						<li class="menu-head">Felhasználói funkciók</li>
							<li>
								<ul class="inner">
									<li><a href="#">Számlaigénylés</a></li>
									<li><a href="#">Vásárlói egyenleg feltöltés</a></li>
									<li><a href="#">Vásárolt termékek kilistázása</a></li>
								</ul>
							</li>
					</ul>  
				</nav>
		</div>
		
          <div id="core" class="profile pull-left">
			<h2 class="pull-center">Profil beállítások</h2>
				
				<div class="acc-row"><span class="acc-info">Reg datum</span> <span class="acc-data"><?php echo $_SESSION["reg_datum"]; ?></span></div>
				<br class="clearfix" />
				
				<div class="acc-row"><span class="acc-info">Státusz: </span> <span class="acc-data"><?php echo $_SESSION["torzsvasarlo"];?></span></div>
				<br class="clearfix" />		
				
				<div class="acc-row"><span class="acc-info">Felhasznaló név:</span> <span class="acc-data"><?php echo $_SESSION["felhasznalo_nev"]; ?></span></div>
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
        include "footer.php"; 
        
        
        ?>
