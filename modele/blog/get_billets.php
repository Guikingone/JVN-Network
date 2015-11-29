<?php
function get_billet($offset, $limit) {

    global $bdd;

    $ffset = (int) $offset;
    $limit = (int) $limit;
    $req = $dd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\')
     AS date_creation_fr FROM news_equipe ORDER BY date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();

    return $billets;
}