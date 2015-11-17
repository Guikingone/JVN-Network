<?php
	include ('inc/header.php');
?>

<?php
if(!empty($_POST)){
	
	$errors = array();
	
	if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
		$errors["pseudo"] = "Votre pseudonyme n'est pas valide.";
	}
	
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors['email'] = "Votre adresse email n'est pas valide.";
	}
	
	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		$errors['password'] = "Vous devez rentrer un mot de passe valide.";
	}
}
?>
<div class="container">
	<div class="row">
	 <div class="col-md-12">
	<br>
	<p>
	  <fieldset>
		 <h1>S'inscrire</h1>
		  
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
		<button type="submit" class="btn btn-danger">M'inscrire
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