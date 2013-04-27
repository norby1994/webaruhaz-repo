	<header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>
                <div id="bejelentkezes" class="headerbar-form pull-right">
					<ul>
	                	<?php
		                	session_start();
							if (!$_SESSION['email']) : ?>
		                    <li><a href="admin/login.php">Bejelentkezés adminként</a></li>
		                    <li><a href="registration.php">Regisztráció</a></li>
	                	<?php endif; ?>
	                	
	                	
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
                <h3>Menü</h3>
                <nav>
                    <ul>
                        <li class="menu-head">
                            Profil Beállítások
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="logout.php">Kijelentkezés</a>
                                </li>
                                <li>
                                    <a href="admin/update.php">Adatok módosítása</a>
                                </li>
                                <li>
                                    <a href="admin/delete.php">Regisztráció törlése</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-head">
                            Admin funkciók
                        </li>
                        <li>
                            <ul class="inner">
                                <li>
                                    <a href="admin/stats.php">Éves statisztika</a>
                                </li>
                                <li>
                                    <a href="admin/orders.php">Vásárlások listázása</a>
                                </li>
                                <li>
                                    <a href="admin/users.php">Felhasználók kezelése</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>