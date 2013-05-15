<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin | Termék felvétele</title>
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
		require_once "../php/admin.php";
		session_check();
        ?>
        

        <div id="wrapper">
			 <header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="/netshop/index.php"><img src="/netshop/img/header.png" alt="Netshop" /></a></h1>
                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a href="product.php">Termék feltöltése</a>
                        </li>
                        <li>
                            <a href="product-edit.php">Termék módosítása</a>
                        </li>
                        <li>
                            <a href="category.php">Kategória felvétele</a>
                        </li>
                        <li>
                            <a href="category-edit.php">Kategória módosítása</a>
                        </li>
                        <li>
                            <a href="catalog.php">Katalógus megtekintése</a>
                        </li>
                    </ul>
                </nav>
            </header>
            <br class="clearfix" />

            <div id="side" class="sidebars pull-left">
            	<h3>Menü</h3>
                <nav>
                    <ul>
                        <li>
                            <a href="product-edit.php">Vissza a termékekhez</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div id="core" class="admin-full pull-left">
                <h2 class="pull-center">Termék módosítása</h2>

  
                 
                <br class="clearfix" />
				<form action="" method="POST" id="iform">
                <div class="acc-row">
                    <span class="acc-info"><label for="kategoria">Kategória:</label></span>
                    <span class="acc-datam">
                        <?php 
							require_once '../php/connection.php';
                			$sql = "SELECT kategoria_id, kategoria_nev FROM kategoria";
             				$result = oci_parse($connect, $sql);
                			oci_execute ($result);
							echo "<select name='kategoria' class='pull-right'>";
							echo "<option value=''>-- Select --</option>";
   							while ($eredmeny = oci_fetch_row($result)){
									echo "<option value=". $eredmeny['0'] . ">" . $eredmeny['1'] . "</option>";						
							}
					       echo "</select>";
						?>  
                    </span>
                </div>
                <br class="clearfix" />
                
                <div class="acc-row">
                    <span class="acc-info"><label for="cimke">Címke:</label></span>
                    <span class="acc-datam">
                        <?php 
							require_once '../php/connection.php';
                			$sql = "SELECT cimke_id, cimke_nev FROM cimke";
             				$result = oci_parse($connect, $sql);
                			oci_execute ($result);
							echo "<select name='cimke' class='pull-right'>";
							echo "<option value=''>-- Select --</option>";
   							while ($eredmeny = oci_fetch_row($result)){
									echo "<option value=". $eredmeny['0'] . ">" . $eredmeny['1'] . "</option>";							
							}
					       echo "</select>";
						?>  
                    </span>
                </div>
                <br class="clearfix" />
				<?php
					require_once '../php/products.php';
					if (isset($_GET['pid'])) {
						$data = product_update_populate($_GET['pid']);	
					} else {
						echo "<script>alert('Nincs kivalasztott termek!'); window.location = 'product-edit.php';</script>";
					}
					
				?>
                <div class="acc-row">
                    <span class="acc-info"><label for="termek_nev">Termék név:</label></span><span class="acc-datam">
                        <input type="text" name="termek_nev"  placeholder="<?php echo iconv("ISO-8859-1", "UTF-8", $data['TERMEK_NEV']); ?>" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="rovid_leiras">Rövid leírása:</label></span><span class="acc-datam">
                        <input type="text" name="rovid_leiras" placeholder="<?php echo iconv("ISO-8859-1", "UTF-8", $data['ROVID_LEIRAS']); ?>" />
                    </span>
                </div>

                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="hosszu_leiras">Hosszú leírása:</label></span><span class="acc-datam">
                        <input type="text" name="hosszu_leiras" placeholder="<?php echo iconv("ISO-8859-1", "UTF-8", $data['HOSSZU_LEIRAS']); ?>" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="ar">Ár:</label></span><span class="acc-datam">
                        <input type="text" name="ar" placeholder="<?php echo $data['AR']; ?>" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="darab_szam">Darab szám:</label></span><span class="acc-datam">
                        <input type="text" name="darab_szam"  placeholder="<?php echo $data['DARAB_SZAM']; ?>"/>
                    </span>
                </div>
                <br class="clearfix" />
                	<input type="hidden" name="termek_id" value="<?php echo $data['TERMEK_ID']; ?>" />
                    <input type="submit" value="Felvétel" class="pull-center" name="modosit" />
                </form>

                <?php
				require_once '../php/products.php';
				
				if (isset($_POST['modosit'])) {
					product_update();
				}
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>
            <?php
	include "../footer.php";
            ?>
