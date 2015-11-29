<?php

include_once('modele/blog/getèbillets.php');
$billets = get_billets(0, 5);

foreach($billets as $cle => $billet){
    $billets[$cle]['titre'] = htmlspecialchars($billet['titre']);
    $billets[$cle]['contenu'] = n12br(htmlspecialchars($billet['contenu']));
}

include_once('vue/blog/index.php');