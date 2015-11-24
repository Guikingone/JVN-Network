<?php
    require ('inc/functions.php');
    include ('inc/header.php');
    require_once('inc/pdo.php');
    logged_only();
    if(!empty($_POST)){

        if(!empty($_POST['password']) || ['password'] != $_POST['password_confirm']){
            $_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas.";

        } 
        else 
        {
            $user_id = $_SESSION['auth']->id;
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $pdo->prepare('UPDATE membres_jvn SET password = ?')->execute([$password]);
            $_SESSION['flash']['success'] = "Votre mot de passe a bien �t� mis � jour.";
        }      
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h1>Bonjour <?= $_SESSION['auth']->pseudo; ?></h1>

            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe" />
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe" />
                </div>
                <button type="submit" class="btn-danger">Changer mon mot de passe</button>
            </form>
        </div>
        <div class="col-lg-6">
            <h1 class="centered">Envie de plus ?</h1>
            <p>JVN-Network fonctionne gr�ce � sa communaut�, en vous inscrivant, vous soutenez ce projet, par la suite, vous pouvez souscrire � un abonnement payant qui assurera au site des revenus permettant de g�rer l'h�bergement, la maintenance, les articles de la Boutique et bien d'autres choses.</p>
            <p>Le syst�me d'abonnement est expliqu� plus en d�tails via la page suivante.</p>
            <button type="submit" class="btn btn-danger" href="Abonnement.php">S'abonner</button>
        </div>
    </div>
</div>


<?php
    include ('inc/footer.php');
?>