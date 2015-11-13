<?php 
	require 'inc/bootstrap.php';
	logged_only();
	if(!empty($_POST)){
		if(empty($_POST['password']) || $_POST['password'] != $_POST['password_cofirm']){
			$_SESSION['flash']['danger'] = "Les mot de passe ne correspondent pas.";
		}else {
			$user_id = $_SESSION['auth']->id;
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
			$require_once ('inc/PDO.php');
			$pdo->prepare('UPDATE membres SET password = ?')->execute(['$password']);
			$_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour.";
		}
	}
	include 'inc/header.php';
?>

<h1>Bonjour <?= $_SESSION['auth']->pseudo; ?></h1>

<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="Changer votre mot de passe"/>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe"/>
	</div>
	<button class="btn">Changer mon mot de passe</button>
</form>

<?php
	include 'inc/footer.php';
?>