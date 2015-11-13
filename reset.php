<?php
	include('inc/header.php');
	include ('inc/functions.php');
	
	if(isset($_GET['id']) && isset($_GET['token'])){
		require 'inc/PDO.php';
		$req = $pdo->prepare('SELECT * FROM membres WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOM(), INTERVAL 30 MINUTE)');
		$req->execute($_GET['id'], ($_GET['token']));
		$pseudo = $req->fetch();
		if($pseudo){
			if(!empty($_POST)){
				if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
					$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
					$pdo->prepare('UPDATE membres SET password = ?, reset_at = NULL, reset_token = NULL')->execute(['password']);
					session_start();
					$_SESSION['flash']['success'] = "Votre mot de passe a bien été modifié.";
					$_SESSION['auth'] = $pseudo;
					header('Location: account.php');
					exit();
				}
			}
		}
	}else {
		session_start();
		$_SESSION['flash']['danger'] = "Ce token n'est pas valide !";
		header ('Location: login.php');
		exit();
	}

?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
		<br>
		 <h1>Réinitialiser mon mot de passe</h1>		
		 <form action="" method="post">
		<div class="form-group">	
			<label>Nouveau mot de passe :</a>
				<input type="password" name="password" class="form-control"/>
			</label>
		</div>
		<div class="form-group">	
			<label>Confirmer votre mot de passe :</a>
				<input type="password" name="password_confirm" class="form-control"/>
			</label>
		</div>
		<button type="submit" class="btn">Réinitialiser mon mot de passe
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
