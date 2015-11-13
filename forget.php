<?php
	include('inc/header.php');
	include ('inc/functions.php');
	require 'inc/bootstrap.php';

if(!empty($_POST) && !empty($_POST['pseudo'])){
	$pdo = App::getDatabase(); 
	$auth = App::getAuth();
	$Session = Session::getInstance();
	if($auth->resetPassword($pdo, $_POST['email'])){
		$Session->setFlash('success', "Les instructions de rappel du mot de passe vous ont été envoyé par email.";
		App::redirect('connexion.php');
}else {
		$Session->setFlash('danger', "Aucun compte ne correspond à cette adresse email." )
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