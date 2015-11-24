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

<h1>Bonjour <?= $_SESSION['auth']->pseudo; ?></h1>

    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe"/>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe" />
        </div>
        <button type="submit" class="btn-danger">Changer mon mot de passe</button>
    </form>


<?php
    include ('inc/footer.php');
?>