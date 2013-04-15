<!doctype html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>NetShop - Felhasználó bejelentkezés</title>
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
           	<div id="login-wrap">
           		<from action="$PHP_SELF" method="post" id="login">
           			<input type="email" name="email" placeholder="Email cím" /> <br />
           			<input type="password" name="jelszo" placeholder="Jelszó" /> <br />
           			<input type="submit" name="login-submit" value="Bejelentkezés" />
           		</from>
           	</div>
        </div>

        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>

    </body>
</html>