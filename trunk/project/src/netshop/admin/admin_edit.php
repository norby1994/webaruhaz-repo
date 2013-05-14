<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin | Kategória módosítása</title>
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

        <div id="wrapper">

<header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="/netshop/index.php"><img src="/netshop/img/header.png" alt="Netshop" /></a></h1>
                <div id="bejelentkezes" class="headerbar-form pull-right">
                    <ul>
                        <li>
                            <a href="../logout.php">Kijelentkezés</a>
                        </li>
                    </ul>
                </div>
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
                <nav>
                    <ul>
                        <li>
                            <a href="category-edit.php">Vissza a kategóriákhoz</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <div id="core" class="admin-full pull-left">
                <h2 class="pull-center">Kategória módosítása</h2>

               
                
                <br class="clearfix" />
				<form action="" method="POST" class="modosit">
                <div class="acc-row">
                    <span class="acc-info"><label for="kategoria_ nev">Új kategória név:</label></span><span class="acc-datam">
                        <input type="text" placeholder="<?php echo $_GET['edit']; ?>" name="kategoria_nev" />
                    </span>
                </div>
                <br class="clearfix" />

                    <input type="submit" value="Módosít" class="pull-center" name="modosit" />
                </form>

                <?php
				
					if (isset($_POST['modosit'])) {
					
						require "../php/connection.php";
						$nev = $_POST['kategoria_nev'];
						$fsql = "UPDATE kategoria SET KATEGORIA_NEV='" . $nev . "' WHERE KATEGORIA_NEV = '" . $_GET['edit'] . "'";
						$bQ = oci_parse($connect, $fsql);
						if (oci_execute($bQ)) {
							header("Location:category-edit.php"); 
						}
					}
				
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>

  		</div>
	</body>
</html>
            