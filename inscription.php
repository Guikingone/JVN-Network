<?php
	include ('inc/header.php');
	require ('inc/Pdo.php');
	
if(!empty($_POST)){
	
	$errors = array();
	
	if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
		$errors["pseudo"] = "Votre pseudonyme n'est pas valide.";
	}else {
		$req = $pdo->prepare('SELECT id FROM membre_jvn WHERE pseudo = ?');
    $req->execute([$_POST['pseudo']]);
    $user = $req->fetch();
    if($user){
    $errors['pseudo'] = "Ce pseudo est déjà pris !";
    
	  }
  }
	
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$errors['email'] = "Votre adresse email n'est pas valide.";
	}else {
		$req = $pdo->prepare('SELECT id FROM membre_jvn WHERE email = ?');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
    $errors['email'] = "Cette adresse email est déjà utilisée !";
    
	  }
	
	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		$errors['password'] = "Vous devez rentrer un mot de passe valide.";
	}
	
	if(empty($errors)){
	$req = $pdo->prepare("INSERT INTO membre_jvn SET pseudo = ?, password = ?, email = ?");
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$req->execute([$_POST['password'], $password, $_POST['email']]);
	
	}
}
?>
<div class="container">
	<div class="row">
	 <div class="col-lg-6">
	<br>
	<br>
	<br>
	  <fieldset class="text-center">
		 <h1>S'inscrire</h1>
      
      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement :</p>
        <ul>
        <?php foreach ($errors as $error): ?>
          <li><?= $error; ?></li>
        <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
		  
		<form action="" method="post">
		<div class="form-group>">
			<label>Votre Pseudonyme :
			  <input type="text" name="pseudo" class="form-control" placeholder="11 caractères max"/>
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
	 </div>
		<div class="col-lg-6">
					<h2 class="text-center">Avant d'aller plus loin</h2>
					<p class="text-center">Avant de vous lancer dans l'aventure, ils nous fallait expliquer plus en détails ce pourquoi nous avons concu ce système de membre à échelle.</p>
					<p class="text-center">JVN.org est un site communautaire libre, nous ne rendons de compte à personne et surtout pas à une équipe de rédaction, NOUS sommes nous tous les rédacteurs du site et ces gardiens, ce site a été crée de manière libre et sans l'aide d'une équipe professionnelle, nous ne devons rien à personne pour sa mise en ligne, les seuls que nous devons remercier sont les membres de l'Equipe originel de JVN, ce sont ces personnes qui nous ont fait apprécier ce pourquoi nous sommes là aujourd'hui, avant de publier ce site et de mettre en branle ce chantier, nous savions que cela serait difficile mais si vous lisez ces lignes, preuve est faite que nous avions juste de nous lancer.
					<br>
					<br>
					Comme nous l'expliquions plus haut, nous sommes libres et nous devons pouvoir faire vivre le site de manière correcte, son hébergement coûte de l'argent tout les mois et son développement peut sembler facile et rapide mais nous devons nous en occuper quotidiennement et personnellement afin de s'assurer que tout est en place où il devrait être, avant même sa création, ce site tout beau tout propre fut le point de départ de débat houleux et dur entre ces créateurs, devions-nous vraiment proposer un service d'abonnement pour le faire vivre ? Devions nous réellement nous reposer sur la communauté et ses généreux donateurs pour le faire fonctionner décemment ?
					<br>
					<br>
					La réponse est difficile et nous devons avouer que même aujourd'hui nous nous questionnons toujours sur la réponse, pour couper court au débat, nous sommes partis sur une base d'abonnement simple et peu contraignant financièrement, payer tout les mois ne serait pas pratique et comme le site ne vit que par sa communauté, nous devions trouver autre chose, payer tout les 3 mois s'imposa de par sa simplicité à mettre en place et de par son aspect rapide et peu contraignant, vous payer, vous obtener un retour sur investissement direct, bien entendu, que pouvions nous offir ?
					<br>
					<br>
					Les détails sont encore sommaires et nul doute que d'autres offres arriveront par la suite, cependant, nous pouvons vous assurer de leur maintien définitif (pour ceux présents actuellement), les détails de ces offres seront publiés plus tard mais sachez que nous sommes là POUR VOUS et que VOUS êtes le moteur du site.
					<br>
					<br>
					Pour vous abonner, rien de plus simple, une fois votre compte créé, vous arriverez sur votre page personnel, cette dernère vous offrira la possibilité de choisir l'abonnement voulu, les démarches sont expliquées par la suite.
					<br>
					<br>
					L'Equipe.</p>
				</div>
			</div>
</div>
<?php
	include("inc/footer.php");
?>