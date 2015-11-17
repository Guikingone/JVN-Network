<?php

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
