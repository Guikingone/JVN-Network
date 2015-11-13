<?php
require_once 'inc/bootstrap.php';

// Vérification des données 
if(!empty($_POST))
{
	$errors = array();
	
	$db = App::getDatabase();
	$validator = new Validator ($_POST);
	$validator->isAlpha('pseudo', "Votre pseudo n'est pas valide !");
	if($validator->isValid()){
			$validator->isUnique('pseudo', $db, 'membres', "Ce pseudo est déjà pris !");
	}
	$validator->isEmail('email', "Votre email n'est pas valide !");
	if($validator->isValid()){
			$validator->isUnique('email', $db, 'membres', "Ce mail est déjà utilisée pour un autre compte !");
	}
	$validator->isConfirmed('password', "Vous devez rentrer un mot de passe valide !");



	// Si tout est bon, on se prépare à rentrer le tout dans la BDD: 
	if($validator->isValid()){
		
		$auth = new Auth();
		$auth->register($pdo, $_POST['pseudo'], $_POST['password'], $_POST['email']);	
		Session::getInstance()->setFlash('success', "Un email de confirmation vous a été envoyé.");
		App::redirect('connexion.php');
	}else {
		$errors = $validator->getErrors();	
	}
	
?>

<?php
	include ('inc/header.php');
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
	<br>
	<p>
	  <fieldset>
		 <h1>S'inscrire</h1>
		  
		  <!-- Erreur fomulaire -->
		  <?php if(!empty($errors)): ?>
		  <div class="alert alert-danger">
		  	<p>Vous n'avez pas rempli le fomulaire correctement : </p>
			 <ul>
			  <?php foreach($errors as $error): ?>
			  	<li><?= $error; ?></li>
			  <?php endforeach; ?>
			</ul>
		  </div>
		  <?php endif; ?>
		  
		<form action="" method="post">
		<div class="form-group>">
			<label>Votre Pseudonyme :
			  <input type="text" name="pseudo" class="form-control"/>
			</label>
		</div>
		<div class="form-group">	
			<label>Votre adresse email :
				<input type="email" id="email" name="email" class="form-control"/>
			</label>
		</div>
		<div class="form-group">	
			<label>Mot de passe :
				<input type="password" name="password" class="form-control"/>
			</label>
		</div>
		<div class="form-group">	
			<label>Confirmer votre mot de passe :
				<input type="password" name="password_confirm" class="form-control"/>
			</label>
		</div>
		<button type="submit" class="btn btn-primary">M'inscrire
		</button>
		</form>
	  </fieldset>
	</p>
	 </div>
	</div>
</div>
<?php
	include("inc/footer.php");
?>