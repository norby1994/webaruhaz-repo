<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin - Felhasználó egyenleg feltöltés</title>
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
		/*
		 * session ellenőrzés elvégzése, hogy illetéktelen 
		 * nem admin felhasználók ne nézhessék meg ennek az oldalnak a tartalmát	
		 */ 
		require_once "../php/admin.php";
		session_check();				    		 
	    ?>
	    
		<div id="wrapper">
        	<?php require_once "../template/admin-menu.php" ?>

            <div id="core" class="admin-full pull-left">
                <h2 class="pull-center">Regisztrált Felhasználók</h2>

            <?php
            	if(isset($_GET['uid'])){
            		$egyenleg = get_user_balance($_GET['uid']);
            	} else {
					echo "<script>alert('Nem valasztottal ki felhasznalot!'); window.location = 'users.php';</script>";
				}  
            ?>
            
            <form id="iform" name="egyenleg" method="post" action="">
            	<?php
            		echo $egyenleg['FELHASZNALO_NEV'] ." jelenlegi egyenlege: " . $egyenleg['EGYENLEG'] .  " FT<br />";
				?>
				<input type="hidden" name="email" value="<?php echo $_GET['uid']; ?>" />
            	 <div class="acc-row">
                    <span class="acc-info"><label for="rovid_leiras">Egyenlegmódosítás:</label></span><span class="acc-datam">
                        <input type="text" name="egyenleg" required="required" class="pull-right"/>
                    </span>
                </div>

                <br class="clearfix" />
                
                <input type="submit" value="Módosít" class="pull-center" name="modosit" />
				<br class="clearfix" />
                <?php
				require_once '../php/products.php';
				
				if (isset($_POST['modosit'])) {
					update_user_balance();
				}
                ?>
            </form>
            </div>

            <?php include "../footer.php"; ?>
