<header class="title-head">
                <h1 class="cim pull-left"><a rel="external" href="index.php">NetShop</a></h1>

                <div id="bejelentkezes" class="headerbar-form pull-right">
                	<ul>
                	<?php
	                	session_start();
						if (!$_SESSION['email']) : ?>
						<li><a href="login.php">Bejelentkezés felhasználóként</a></li>
	                    <li><a href="admin/login.php">Bejelentkezés adminként</a></li>
	                    <li><a href="registration.php">Regisztráció</a></li>
                	<?php endif; ?>
                	
                	<?php
	                	session_start();
						if ($_SESSION['email']) : ?>
						<li><a href="logout.php">Kijelentkezés</a></li>
                	<?php endif; ?>
                		
                	</ul>
                </div>

                <br class="clearfix" />

                <nav>
                    <ul>
                        <li>
                            <a rel="external" href="#">Póló</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Pulóver</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
                        </li>
                        <li>
                            <a rel="external" href="#">Kategória</a>
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