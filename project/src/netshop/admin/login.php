<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Admin Bejelentkezés</title>
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
		if (isset($_GET['Error']))
			echo $_GET['Error'];
        ?>
        <div id="wrapper">
            <div id="login-wrap">
                <form action="" method="post" >
                    <input type="email" name="email" id="email" placeholder="Email cím" />
                    <br />
                    <input type="password" name="jelszo" id="jelszo" placeholder="Jelszó" />
                    <br />
                    <input type="submit" name="login-submit" value="Bejelentkezés" />
                </form>
            </div>
        </div>

        <?php
		require_once "../php/admin.php";
		if (isset($_POST['login-submit'])) {
			login_check();
		}

        ?>

        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

    </body>
</html>