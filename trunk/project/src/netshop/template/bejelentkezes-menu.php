<?php
	require_once '/php/felhasznalo.php';
	
	if (logged_in()):
?>
<div id="bejelentkezes" class="headerbar-form pull-right">
	<ul>
		<li>
			Üdvözlünk <a href="profile.php"><?php echo $_SESSION['nev']; ?></a>!
		</li>
		<li>
			<a href="logout.php">Kijelentkezés</a>
		</li>
	</ul>
</div>

<?php else : ?>
<div id="bejelentkezes" class="headerbar-form pull-right">
	<ul>
		<li>
			<a href="login.php">Bejelentkezés felhasználóként</a>
		</li>
		<li>
			<a href="admin/login.php">Bejelentkezés adminként</a>
		</li>
		<li>
			<a href="registration.php">Regisztráció</a>
		</li>
	</ul>
</div>
<?php endif; ?>