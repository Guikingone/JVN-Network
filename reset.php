<?php
	include ('inc/header.php');
    require ('inc/functions.php');
    require ('inc/Pdo.php');

    if(isset($_GET['id']) && isset($_GET['token'])){
        $req = $pdo->prepare('SELECT * FROM membres_jvn WHERE id= ? and reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
        $req->execute([$_GET['id'], $_GET['token']]);
        $user = $req->fetch();

        if($user){
            if(!empty($_POST)){
                if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $pdo->prepare('UPDATE membres_jvn SET password = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                    session_start();
                    $_SESSION['flash']['success'] = "Votre mot de passe a bien été modifié.";
                    $_SESSION['auth'] = $user;
                    header('Location: account.php');
                    exit();
                }
            }
            
        }else {
            session_start();
            $_SESSION['flash']['danger'] = "Ce token n'est pas valide";
            header('Location: connexion.php');
            exit();
        }

    }else {
        
        header('Location: connexion.php');
        exit();
    }
?>

<div class="container">
	<div class="row">
	 <div class="col-lg-12">
		<br>
		<fieldset class="centered">
		 <h1>Réinitialiser mon mot de passe :</h1>		
		 <form action="" method="post">
		<div class="form-group">	
			<label>Mot de passe :</a>
				<input type="password" name="password" class="form-control"/>
			</label>
		</div>
		<div class="form-group">
			<label>Confirmation du mot de passe
				<input type="password" name="password_confirm" class="form-control"/>
			</label>
		</div>
		<button type="submit" class="btn btn-danger">Réinitialiser mon mot de passe</button>
		</form>
		</fieldset>
	</p>
	 </div>
	</div>
</div>
<?php
    include ('inc/footer.php');
?>