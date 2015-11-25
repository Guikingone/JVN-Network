<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="GuikProd.">

		<!-- Titre / Domaine -->
		<title>JVN.org</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/Bootstrap/bootstrap.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/main.css" rel="stylesheet">

		<!-- Normalize -->
		<link rel="stylesheet" href="../css/normalize.css">

		<!-- Custom Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
<body>
<div class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="index.php">Accueil</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
							<a data-toggle="dropdown" href="#">Membres<b class="caret"></b></a>
							<ul class="dropdown-menu">
                                <?php if(isset($_SESSION['auth'])): ?>
                                    <li><a href="logout.php">Se déconnecter</a></li>
                                <?php else: ?>
								<li>
									<a href="inscription.php">S'inscrire</a>
								</li>
								<li>
									<a href="connexion.php">Se Connecter</a>
								</li>
                                <?php endif;?>
							</ul>
							</li>
						<li>
							<a href="Blog.php">Blog</a>
						</li>
						<li>
							<a href="#Commu.php">Communauté</a>
						</li>
						<li>
							<a href="#Forums.php">Forums</a>
						</li>
						<li>
							<a href="Boutique.php">Boutique</a>
						</li>
					</ul>
				</div>
		</div>
</div>
<?php if(isset($_SESSION['flash'])): ?>
<?php foreach($_SESSION['flash'] as $type => $message): ?>
    <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
    </div>
<?php endforeach; ?>
<?php unset ($_SESSION['flash']);?>
<?php endif;?>
	