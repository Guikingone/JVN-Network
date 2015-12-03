<?php
require '../lib/autoload.class.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);

if (isset($_GET['modifier']))
{
    $news = $manager->getUnique((int) $_GET['modifier']);
}

if (isset($_GET['supprimer']))
{
    $manager->delete((int) $_GET['supprimer']);
    $message = 'La news a bien été supprimée !';
}

if (isset($_POST['auteur']))
{
    $news = new News(
      [
        'auteur' => $_POST['auteur'],
        'titre' => $_POST['titre'],
        'contenu' => $_POST['contenu']
      ]
    );
    
    if (isset($_POST['id']))
    {
        $news->setId($_POST['id']);
    }
    
    if ($news->isValid())
    {
        $manager->save($news);
        
        $message = $news->isNew() ? 'La news a bien été ajoutée !' : 'La news a bien été modifiée !';
    }
    else
    {
        $erreurs = $news->erreurs();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Administration</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="../css/Bootstrap/bootstrap.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Bienvenue sur la page d'administration</h3>
                <p class="text-center">Ici, vous pourrez administrer le blog de l'Equipe et ajouter les billets en temps réel, ce panneau de configuration est encore imparfait et sera amené 
                à s'améliorer de par la suite, veuillez donc comprendre si certains soucis surviennent, vous pouvez nous contacter à cette adresse <em>equipe_support_technique@jvn-network.fr</em> à tout moment, précisez dans l'objet du mail ceci :
                "JVN-TEAM\\ Votre soucis || Date et Heure de l'erreur ou soucis //JVN-TEAM" afin que ces mails soient traités en priorités.</p>
                <p class="text-center">Vous pouvez ajouter, supprimer et modifier une news via ce panneau, soyez prudent durant chaque étape et vérifier chaque modification et suppresion avant de valider !</p>
                <p class="text-center">L'Equipe technique</p>
                <div class="text-center"><button class="btn"><a href="../Index.php">Accéder à l'accueil du site</a></button></div>

                <div class="container">
                    <br />
                    <div class="row">
                        <div class="col-lg-12">
                         <!-- Formulaire -->
                            <form action="admin.php" method="post">
                                <?php
                                if (isset($message))
                                {
                                    echo $message, '<br />';
                                }
                                ?>
                                <?php if (isset($erreurs) && in_array(News::AUTEUR_INVALIDE, $erreurs)) echo 'L\'auteur est invalide.<br />'; ?>
                                Auteur : <input class="form-control" type="text" name="auteur" value="<?php if (isset($news)) echo $news->auteur(); ?>" /><br />

                                <?php if (isset($erreurs) && in_array(News::TITRE_INVALIDE, $erreurs)) echo 'Le titre est invalide.<br />'; ?>
                                Titre : <input class="form-control" type="text" name="titre" value="<?php if (isset($news)) echo $news->titre(); ?>" /><br />

                                <?php if (isset($erreurs) && in_array(News::CONTENU_INVALIDE, $erreurs)) echo 'Le contenu est invalide.<br />'; ?>
                                Contenu :<br /><textarea class="form-control" rows="8" cols="60" name="contenu"><?php if (isset($news)) echo $news->contenu(); ?></textarea><br />
                                <?php
                                if(isset($news) && !$news->isNew())
                                {
                                ?>
                                <input type="hidden" name="id" value="<?= $news->id() ?>" />
                                <button class="btn btn-danger" type="submit" value="Modifier" name="modifier">Envoyer</button>
                                <?php
                                }
                                else
                                {
                                ?>
                                <button class="btn btn-danger" type="submit" value="Ajouter">Ajouter</button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>

                <p class="text-center">Il y a actuellement <?= $manager->count() ?> news. En voici la liste :</p>

                <table>
                    <tr><th>Auteur</th><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
                    <?php
foreach ($manager->getList() as $news)
{
    echo '<tr><td>', $news->auteur(), '</td><td>', $news->titre(), '</td><td>', $news->dateAjout()->format('d/m/Y à H\hi'), '</td><td>', ($news->dateAjout() == $news->dateModif() ? '-' : $news->dateModif()->format('d/m/Y à H\hi')), '</td><td><a href="?modifier=', $news->id(), '">Modifier</a> | <a href="?supprimer=', $news->id(), '">Supprimer</a></td></tr>', "\n";
}
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
