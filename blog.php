<?php
require 'lib/autoload.class.php';

$db = DBFactory::getMysqlConnexionWithPDO();
$manager = new NewsManagerPDO($db);

include ('inc/header.php');
?>
<?php
if (isset($_GET['id']))
{
    $news = $manager->getUnique((int) $_GET['id']);
    
    echo '<p>Par <em>', $news->auteur(), '</em>, le ', $news->dateAjout()->format('d/m/Y à H\hi'), '</p>', "\n",
    '<h2>', $news->titre(), '</h2>', "\n",
    '<p>', nl2br($news->contenu()), '</p>', "\n";
    
    if ($news->dateAjout() != $news->dateModif())
    {
        echo '<p style="text-align: right;"><small><em>Modifiée le ', $news->dateModif()->format('d/m/Y à H\hi'), '</em></small></p>';
    }
}

else
{
    echo '<h2 class="text-center">Le blog de l\'Equipe</h2>';
    
    foreach ($manager->getList(0, 5) as $news)
    {
        if (strlen($news->contenu()) <= 200)
        {
            $contenu = $news->contenu();
        }
        
        else
        {
            $debut = substr($news->contenu(), 0, 200);
            $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
            
            $contenu = $debut;
        }
        
        echo '<h4 class="text-center"><a href="?id=', $news->id(), '">', $news->titre(), '</a></h4>', "\n",
        '<p class="text-center">', nl2br($contenu), '</p>';
    }
}

include ('inc/footer.php');
?>