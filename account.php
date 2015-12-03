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
            $_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour.";
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
            <p>JVN-Network fonctionne grâce à sa communauté, en vous inscrivant, vous soutenez ce projet, par la suite, vous pouvez souscrire à un abonnement payant qui assurera au site des revenus
             permettant de gérer l'hébergement, la maintenance, les articles de la Boutique et bien d'autres choses.</p>
            <p>Le système d'abonnement est expliqué plus en détails via la page suivante.</p>
            <a href="Abonnement.php"><button type="submit" class="btn btn-danger">S'abonner</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
           <!-- News -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Fonctionnalitées -->
            <div class="row">
                <div class="col-lg-4">
                    <!-- Formulaire Soutien technique -->
                    <h2 class="text-center">Besoin de soutien ?</h2>
                    <form action="inc/fonc_php/send_mail_soutien.php" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="pseudo" />
                        </div>
                        <div class="form-control">
                            <input class="form-control" type="text" name="message" />
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <!-- Messagerie -->
                    <h2 class="text-center">Votre messagerie</h2>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
</div><!-- Fin Container -->
<?php
    include ('inc/footer.php');
?>