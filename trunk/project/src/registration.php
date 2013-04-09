<!doctype html>
<html lang="hu">
<head>
	<meta charset="utf-8">
	<title>NetShop</title>
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
			
			<form action="" method="POST" name="bejelentkezes" id="bejelentkezes" class="headerbar-form pull-right">
				<input class="mezo" type="text" placeholder="email" />
				<input class="mezo" type="password" placeholder="jelszó" />
				<input type="submit" class="btn" value="Bejelentkezés" />
            </form>
            
			<br class="clearfix" />
			
            <nav>  
                <ul>  
					<li><a rel="external" href="#">Kategória1</a></li>
                    <li><a rel="external" href="#">Kategória2</a></li>
                    <li><a rel="external" href="#">Kategória3</a></li>
					<li><a rel="external" href="#">Kategória4</a></li>  
					<li><a rel="external" href="#">Kategória5</a></li>
					<li><a rel="external" href="#">Kategória6</a></li>
                </ul>  
            </nav>  
        </header>
		<br class="clearfix" />
        <div id="side" class="sidebars pull-left">
			Ide kerülnek majd a menük
		</div>
        <div id="core" class="home pull-left">
			<h2>Regisztráció*</h2>
	
			<form action="registration.php" method="POST" name="regisztracio" id="regisztracio" enctype="multipart/form-data">
					<label for="nev" class="pull-left">Név:</label>
						<input type="text" id="nev" name="nev" class="pull-right" placeholder="név" required="required" /><br class="clearfix"/>
						
					<label for="nem" class="pull-left">Nem:</label>
						<div class="pull-right"><input type="radio" name="nem" value="Férfi" required="required" /> Férfi <input type="radio" name="nem" value="Nő" required="required" /> Nő</div><br class="clearfix"/>
						
					<span id="szuldatum" class="pull-left">Születési dátum:</span><br class="clearfix"/>
					<label for="ev">Év:</label> <input type="text" id="ev" name="ev" placeholder="év" required="required" />
					<label for="honap">Hónap:</label> <input type="text" id="honap" name="honap" placeholder="hónap" required="required" />
					<label for="nap">Nap:</label> <input type="text" id="nap" name="nap" class="pull-right" placeholder="nap" required="required" /><br class="clearfix"/>
						
	
					<label for="ir_szam" class="pull-left">Irányítószám:</label> <input type="text" id="ir_szam" name="ir_szam" class="pull-right" placeholder="ir.szám" required="required" /><br class="clearfix"/>
					<label for="varos" class="pull-left">Város:</label> <input type="text" id="varos" name="varos" class="pull-right" placeholder="város" required="required" /><br class="clearfix"/>
					<label for="utca" class="pull-left">Utca:</label> <input type="text" id="utca" name="utca" class="pull-right" placeholder="utca" required="required" /><br class="clearfix"/>
					<label for="hazszam" class="pull-left">Házszám:</label> <input type="text" id="hazszam" name="hazszam" class="pull-right" placeholder="hsz" required="required" /><br class="clearfix"/>
						
					<label for="telefon" class="pull-left">Telefonszám:</label>
						<input type="tel" id="telefon" name="telefon" class="pull-right" placeholder="telefonszám" required="required" /><br class="clearfix"/>
						
					<label for="email" class="pull-left">Email cím:</label>
						<input type="email" id="email" name="email" class="pull-right" placeholder="email" required="required" /><br class="clearfix"/>
						
					<label for="jelszo" class="pull-left">Jelszó:</label>
						<input type="password" id="jelszo" name="jelszo" class="pull-right" placeholder="jelszó" required="required" /><br class="clearfix"/>
						
					<label for="jelszo2" class="pull-left">Jelszó mégegyszer:</label>
						<input type="password" id="jelszo2" name="jelszo2" class="pull-right" placeholder="jelszó" required="required" /><br class="clearfix"/>
				<p id="hint">*Az űrlapon lévő összes mező kitöltése kötelező</p>	
				<input type="submit" name="submit-button" value="Elküld" id="submit-button" /><br class="clearfix"/>  
			</form>
        </div>
		
		<div id="side2" class="sidebars pull-right">
			<h3>Legfrissebb termékek</h3>
			
		</div>
              
        <footer class="clearfix"> 
			<div id="foot-nav">
                <a rel="external" href="#">Főoldal</a> |
                <a rel="external" href="#">Rólunk</a> |
                <a rel="external" href="#">Kapcsolat</a>
			</div>
            <p>Copyrigt © 2013</p>  
        </footer>  
    </div>  
	
	<script type="text/javascript" src="js/scripts.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>
<?php 

if (isset($_POST['submit-button'])) {
	require_once 'php/bean/felhasznalo.php';
	$felhasznalo = new Felhasznalo($_POST['email'], $_POST['jelszo'], $_POST['nev'], $_POST['ev'], $_POST['honap'],
			$_POST['nap'], $_POST['nem'], $_POST['telefon']);
	
	$felhasznalo->regisztracio();
}

?>