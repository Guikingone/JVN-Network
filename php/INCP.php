<?php
// Vérification de la validité des informations envoyées
if (isset($_POST['login']) & isset($_POST['pass']))
{
	header('Location: membre.php');
}
// Hachage du mot de passe
$pass_hache = sha1($_post['pass']);

// Insertion dans la bdd
$req = $bdd->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription) VALUES (:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
		'pseudo' => $pseudo,
		'pass' => $pass_hache,
		'email' => $email));
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
		<link href="../css/Bootstrap/bootstrap.css" rel="stylesheet">

		<!-- Foundation Core CSS -->
		<link href="../css/Foundation/foundation.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../css/main.css" rel="stylesheet">

		<!-- Normalize -->
		<link rel="stylesheet" href="../css/normalize.css">

		<!-- Custom Fonts -->
		<link href="startbootstrap-agency-1.0.4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

<!-- Inscription / Connexion -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<p class="login">
			<fieldset>
				<legend>S'inscrire</legend>
				<form action="membre.php" method="post">
				<label>Votre Pseudonyme :
					<input type="text" name="pseudo" id="pseudo" placeholder="Ex : ManuLaPute" value="<?php if(isset($_POST['login'])) echo htmlspecialchars(trim($_POST['login'])); ?>">
				</label>
				<label>Votre adresse mail :
					<input type="text" name="mail" id="mail" placeholder="Ex : Guik'@jvn.org">
				</label>
				<label>Taper votre mot de passe :
					<input type="password" name="password" id="password"/>
				</label>
				<label>Retaper votre mot de passe :
					<input type="password" name="password" id="password" value="<?php if(isset($_POST['pass'])) echo htmlspecialchars($_POST['pass']); ?>">
				</label>
			<div class="row">
    			<div class="col-lg-12">
					<label>Choisissez votre abonnement (Plus d'infos <a href="#">ici</a>) :</label>
      					<input type="radio" name="pokemon" value="Membre Actif" id="Membre Actif">			  			<label>Membre Actif</label>
						<input type="radio" name="pokemon" value="Membre VIP" id="Membre VIP">			 				<label>Membre VIP</label>
						<input type="radio" name="pokemon" value="Membre God" id="Membre God">							<label>Membre God</label>
			<div class="row">
				<div class="col-lg-12">
						<input type="radio" name="pokemon" value="Membre VIP" id="Membre VIP">			 				<label>Membre VIP</label>
						<input type="radio" name="pokemon" value="Membre God" id="Membre God">							<label>Membre God</label>

				</div>
			</div>
    			</div>
			</div>
				<label>
					<input type="submit" value="Envoyer"/>
				</label>
				</form>
				<?php
				if (isset($erreur)) echo '<br />', $erreur;
				 ?>
			</fieldset>

		</p>
		</div>
	</div>
</div>
	<!-- ========== Javascript ========== -->

	<!-- jQuery -->
	<script src="../js/vendor/jquery-1.11.3.min.js"></script>

	<!-- Modernizr -->
	<script src="../js/vendor/modernizr-2.8.3.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- Core JS -->
	<script src="../js/main.js"></script>

</body>
</html>
