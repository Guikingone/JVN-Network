<?php
	include('inc/header.php');
	include ('inc/functions.php');

if(!empty($_POST) && !empty($_POST['pseudo'])){
	require 'inc/PDO.php';
	$req = $pdo->prepare('SELECT * FROM membres WHERE email = ? AND confirmed_at IS NOT NULL');
	$req->execute([$_POST['email']]);
	$pseudo = $req->fetch();
	if($pseudo){
		
		session_start();
		$reset_token = str_random(60);
		$pdo->prepare('UPDATE membres SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $pseudo->id]);
		$_SESSION['flash']['success'] = "Les instructions de rappel du mot de passe vous ont été envoyé par email.";
		mail($_POST['email'], "Réinitialisation de votre mot de passe", "Afin de réinitialiser votre mot de passe, merci de cliquer sur ce lien\n\n:http://localhost/JVN/Fichiers/reset.php?id={$user->id}&token=$reset_token");
		header('Location: login.php');
		exit();
	}else{
		
		$_SESSION['flash']['danger'] = "Aucun compte ne correspond à cet email.";
	}
}
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
		<br>
		 <h1>Mot de passe oublié</h1>		
		 <form action="" method="post">
		<div class="form-group>">
			<label>adresse email :
			  <input type="email" name="email" class="form-control"/>
			</label>
		</div>
		<button type="submit" class="btn">Se connecter
		</button>
		</form>
	  </fieldset>
	</p>
	 </div>
	</div>
</div>
<?php
	include ('inc/footer.php');
?>