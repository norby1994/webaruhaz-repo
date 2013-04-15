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

                <div id="bejelentkezes">
                    <a href="login.php">Bejelentkezés felhasználóként</a>
                    <a href="/admin/login.php">Bejelentkezés adminként</a>
                </div>
                
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
                        <li class="menu-head">
                            Profil Beállítások
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="#">Kijelentkezés</a>
                                </li>
                                <li>
                                    <a href="#">Adatok módosítása</a>
                                </li>
                                <li>
                                    <a href="#">Regisztráció törlése</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-head">
                            Admin funkciók
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="#">Éves statisztika</a>
                                </li>
                                <li>
                                    <a href="#">Vásárlások listázása</a>
                                </li>
                                <li>
                                    <a href="#">Felhasználók kezelése</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="core" class="profile pull-left">
                <h2 class="pull-center">Profil módosítások</h2>

                <div class="acc-row">
                    <span class="acc-info"><label for="nev">Felhasznaló név:</label></span><span class="acc-datam">
                        <input type="text" placeholder="Kun Béla" name="nev" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="email">Email:</label></span><span class="acc-datam">
                        <input type="text" placeholder="kun.bela@gmail.com" name="email" />
                    </span>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Születési dátum:</span>
                    <br />

                    <div class="acc-datam">
                        <label for="ev">Év:</label>
                        <input type="text" name="ev" placeholder="1990" />
                        <br class="clearfix"/>
                        <label for="honap">Hónap:</label>
                        <input type="text" name="honap" placeholder="AUG" />
                        <br class="clearfix"/>
                        <label for="nap">Nap:</label>
                        <input type="text" name="nap" class="pull-right" placeholder="08" />
                        <br class="clearfix"/>
                    </div>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info">Lakcím:</span>
                    <br />

                    <div class="acc-datam">
                        <label for="ir_szam" class="pull-left">Irányítószám:</label>
                        <input type="text" name="ir_szam" placeholder="6623" />
                        <br class="clearfix"/>
                        <label for="varos" class="pull-left">Város:</label>
                        <input type="text" name="varos" placeholder="Szeged"/>
                        <br class="clearfix"/>
                        <label for="utca" class="pull-left">Utca:</label>
                        <input type="text" name="utca" placeholder="Szivárvány utca" required="required" />
                        <br class="clearfix"/>
                        <label for="hazszam" class="pull-left">Házszám:</label>
                        <input type="text" name="hazszam" placeholder="52" />
                        <br class="clearfix"/>
                    </div>
                </div>
                <br class="clearfix" />

                <div class="acc-row">
                    <span class="acc-info"><label for="telefon">Telefon:</label></span><span class="acc-datam">
                        <input type="text" name="telefon" placeholder="06706664545" />
                    </span>
                </div>
                <br class="clearfix" />

                <form action="" method="POST" class="modosit">
                    <input type="submit" value="Módosít" class="pull-center" name="modosit" />
                </form>

            </div>

            <div id="side2" class="sidebars pull-right">
                <h3>Legutóbbi vásárlások</h3>
            </div>

            <footer class="clearfix">
                <div id="foot-nav">
                    <a rel="external" href="#">Főoldal</a> | <a rel="external" href="#">Rólunk</a> | <a rel="external" href="#">Kapcsolat</a>
                </div>
                <p>
                    Copyrigt © 2013
                </p>
            </footer>
        </div>

        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

    </body>
</html>