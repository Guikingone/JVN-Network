<?php
	include ('inc/header.php');
    require_once ('inc/function.php');

    if(!empty($_POST) && !empty($_POST['pseudo']) && $_POST['password']){
        require_once ('inc/pdo.php');

        $req = $pdo->prepare('SELECT * FROM membres_jvn WHERE (pseudo = :pseudo OR email = :pseudo) AND confirmed_at is NOT NULL');
        $req->execute(['pseudo' => $_POST['pseudo']]);
        $user = $req->fetch();
        if(password_verify($_POST['password'], $user->password)){
            session_start();
            $_SESSION['auth'] = $user;
            $_SESSION['flash']['success'] = "Vous êtes maintenant bien connecté.";
            header('Location: account.php');
            exit();
        }else {
            $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect !";
        }
    }
?>
<div class="container">
	<div class="row">
	 <div class="col-lg-12">
		<br>
		<fieldset class="centered">
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
		<button type="submit" class="btn btn-danger">Se connecter
		</button>
		</form>
		<fieldset>
	</p>
	 </div>
	</div>
</div>
<?php
	include ('inc/footer.php');
?>
