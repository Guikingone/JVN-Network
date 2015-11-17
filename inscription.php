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