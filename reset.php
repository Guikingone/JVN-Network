<?php
	include('inc/header.php');
	include ('inc/bootstrap.php');
	
	if(isset($_GET['id']) && isset($_GET['token'])){
		
		$auth = App::getAuth();
		$pdo = App::getDatabase();
		$pseudo = $auth->checkResetToken($pdo, $_GET['id'], $_GET['token']);
		if($pseudo){
			if(!empty($_POST)){
				$validator = new Validator($_POST);
				$validator->isConfirmed('password');
				if($validator->isValid()){
					
					$password = $auth->hashPassword($_POST['password']);
					$pdo->query('UPDATE membres SET password = ?, reset_at = NULL, reset_token = NULL WHERE Id = ?', [$password, $_GET['id']]);			
					Session::getInstance()->setFlash('success', "Votre mot de passe a bien été validé.");
					$auth->connect($pseudo);
					App::redirect('account.php');
				}
			}		
		}
	}else {
		Session::getInstance()->setFlash('danger', "Ce token n'est pas valide !");
		App::redirect('login.php');
	}else {
		App::redirect('login.php');
	}
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
