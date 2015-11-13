<?php
	include('inc/header.php');
	$auth = App::getAuth();
	$auth->connectFromCookie();
	
	if(isset($_SESSION['auth'])){
		header('Location: account.php');
		exit();
	}
;
if(!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['password'])){
	require 'inc/PDO.php';
	$req = $pdo->prepare('SELECT * FROM membres WHERE (pseudo = :pseudo OR email = :pseudo) AND confirmed_at IS NOT NULL');
	$req->execute(['pseudo' =>$_POST['pseudo']]);
	$pseudo = $req->fetch();
	if(password_verify($_POST['password'], $pseudo->password)){
		
		session_start();
		$_SESSION['auth'] = $pseudo;
		$_SESSION['flash']['success'] = "Vous êtes maintenant en ligne.";
		
		if($_POST['remember']){
			
			$remember_token = str_random(255);
			$pdo->prepare('UPDATE membres SET remember_token = ? WHERE id = ?')->execute([$remember_token, $pseudo->id]);
			setcookie('remember', $pseudo->id . '//' . $remember_token . sha1($pseudo->id . 'ratonslaveursdupok'), time() + 60 * 60 * 24 * 7);
		}
		header('Location: account.php');
		exit();
	}else {
		$_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect.";
	}
}
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
		<br>
		 <h1>Se connecter :</h1>		
		 <form action="" method="post">
		<div class="form-group>">
			<label>Votre Pseudonyme ou adresse email :
			  <input type="text" name="pseudo" class="form-control"/>
			</label>
		</div>
		<div class="form-group">	
			<label>Mot de passe : <a href="forget.php">(J'ai oublier mon mot de passe)</a>
				<input type="password" name="password" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<label>Se souvenir de moi
				<input type="checkbox" name="remember" value="1"/>
			</label>
		</div>
		<button type="submit" class="btn">Se connecter
		</button>
		</form>
	</p>
	 </div>
	</div>
</div>
<?php
	include ('inc/footer.php');
?>
