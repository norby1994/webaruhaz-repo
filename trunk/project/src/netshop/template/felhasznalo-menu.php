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
									<li><a href="logout.php">Kijelentkezés</a></li>
									<li><a href="profile-update.php">Adatok módosítása</a></li>
									<li><a href="delete.php">Regisztráció törlése</a></li>
								</ul>
							</li>
						<li class="menu-head">Felhasználói funkciók</li>
							<li>
								<ul class="inner">
									<li><a href="check.php">Számlaigénylés</a></li>
									<li><a href="balance.php">Vásárlói egyenleg feltöltés</a></li>
									<li><a href="user-orders.php">Vásárolt termékek kilistázása</a></li>
								</ul>
							</li>
					</ul>  
				</nav>
		</div>