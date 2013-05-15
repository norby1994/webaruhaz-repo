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
		<script type="text/javascript" src="/netshop/js/script.js"></script>
		<script type="text/javascript" src="/netshop/js/jquery-1.9.1.min.js"></script>
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
                            <a href="category-edit.php">Vissza a kategóriákhoz</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="core" class="admin-full pull-left">
                <h2 class="pull-center">Új kategória felvétele</h2>

                <br class="clearfix" />
                <button type="button" id="att-new">Új attribútum hozzáadása</button> 
                <button type="button" id="att-old">Választás a meglévő attribútumok közül</button> 
                
                <div id="att-new-add"> <!-- kategória felvétele új attribútum hozzáadásával -->
                <form name="felvetel-uj" class="felvetel">
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum:</label></span><span class="acc-datam">
                            <select id="att-select">
                                <option value=""> --- </option>
                                <option value="selec"> lenyíló menü </option>
                                <option value="checkbox"> checkbox </option>
                                <option value="radio"> radio gomb </option>
                            </select> </span>
                    </div>
                    <br class="clearfix" />
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum neve:</label></span>
                        <span class="acc-datam">
                            <input type="text" name="att1"/>
                        </span>
                    </div>
                    <br class="clearfix" />
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum érték:</label></span>
                        <span class="acc-datam">
                            <input type="text" name="att1"/>
                        </span>
                    </div>
                    <br class="clearfix" />
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum érték:</label></span>
                        <span class="acc-datam">
                            <input type="text" name="att2"/>
                        </span>
                    </div>
                    <br class="clearfix" />
                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria">Attribútum érték:</label></span>
                        <span class="acc-datam">
                            <input type="text" name="att3"/>
                        </span>
                    </div>
                    <br class="clearfix" />

                    <div class="acc-row">
                        <span class="acc-info"><label for="kategoria_nev">Kategória név:</label></span><span class="acc-datam">
                            <input type="text" name="kategoria_nev" />
                        </span>
                    </div>
                    <br class="clearfix" />
                    <input type="submit" value="Felvétel" class="pull-center" name="felvetel-uj" />
                </form>
				</div>
				
				<div id="att-old-add"> <!-- kategória felvétele régi attribútum kiválasztásával -->
					
                <form name="felvetel-regi" class="felvetel">
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
                                                                        echo "<option value='" .iconv("ISO-8859-1", "UTF-8", $item) . "'>" .iconv("ISO-8859-1", "UTF-8", $item) ."</option>";
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
                    <input type="submit" value="Felvétel" class="pull-center" name="felvetel-regi" />
                </form>
				</div>
                <?php
				if (isset($_POST['felvetel-regi'])) {
					category-insert();
				}
				
				if (isset($_POST['felvetel-uj'])) {
					category-insert();
				}
                ?>
            </div>

            <div id="side2" class="sidebars pull-right">

            </div>
        </div>
        <?php
		include "../footer.php";
        ?>
