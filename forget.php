<?php
    require_once ('inc/pdo.php');
    include ('inc/header.php');
    if(!empty($_POST) && !empty($_POST['email'])){

        $req = $pdo->prepare('SELECT * FROM membres_jvn WHERE email = ? AND confirmed_at is NOT NULL');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            session_start();
            $reset_token = str_random(65);
            $pdo->prepare('UPDATE membres_jvn SET reset_token = ?, reset_at = NOw() WHERE id = ?')->execute([$reset_token, $user->id]);
            $_SESSION['flash']['success'] = "Les instructions de rappel de mot de passe vous ont été envoyé par email.";
            mail($_POST['email'], "Réinitialisation de votre mot de passe", "Afin de réinitialiser votre mot de passe, merci de cliquer sur ce lien\n\nhttp://localhost/Jvn_network/JVN/reset.php?id={$user->id}&token=$reset_token");
            header('Location: connexion.php');
            exit();
        }else {
            $_SESSION['flash']['danger'] = "Aucun compte ne correspond à cette adresse.";
        }
    }


?>
<div class="container">
	<div class="row">
	 <div class="col-lg-12">
		<br>
		<fieldset class="centered">
		 <h1>Mot de passe oublié :</h1>		
		 <form action="" method="post">
		<div class="form-group>">
			<label>Votre adresse mail :
			  <input type="email" name="email" class="form-control"/>
			</label>
		</div>
		<button type="submit" class="btn btn-danger">Se connecter</button>
		</form>
		</fieldset>
	</p>
	 </div>
	</div>
</div>
<?php
    include ('inc/footer.php');
?>