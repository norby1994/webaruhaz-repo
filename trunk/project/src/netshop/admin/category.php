<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin | Kategória felvétele</title>
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
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>
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

            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Új kategória felvétele</h2>

                <br class="clearfix" />
                <form action="" method="POST" class="felvetel">
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum:</label></span><span class="acc-datam">
                            <?php
							require_once '../php/connection.php';
							$sql = "SELECT attributum_nev FROM attributum";
							$result = oci_parse($connect, $sql);
							oci_execute($result);
							echo "<select name='ertek'>";
							echo "<option value=''>-- Select --</option>";
							while ($eredmeny = oci_fetch_row($result)) {
								foreach ($eredmeny as $item) {
									echo "<option value='=$item;'>$item</option>";
								}
							}
							echo "</select>";
                            ?></span>
                    </div>
                    <br class="clearfix" />

                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria_nev">Kategória név:</label></span><span class="acc-datam">
                            <input type="text" name="kategoria_nev" />
                        </span>
                    </div>
                    <br class="clearfix" />
                    <input type="submit" value="Felvétel" class="pull-center" name="felvetel" />
                </form>

                <?php
				if (isset($_POST['modosit'])) {
					data_update();
				}
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>
        </div>
        <?php
		include "../footer.php";
        ?>
    </body>
</html>
