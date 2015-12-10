<?php

class TchatManagerPDO extends TchatManager{

    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    protected function add(Tchat $message){
    $requete = $this->db->prepare('INSERT INTO tchat SET auteur = :auteur, message = :message');
    $requete->bindValue(':auteur', $message->auteur());
    $requete->bindValue(':message', $message->contenu());
    $requete->execute();
  }


  public function count(){
    return $this->db->query('SELECT COUNT(*) FROM tchat')->fetchColumn();
  }

  public function getList($debut = -1, $limite = -1){
    $sql = 'SELECT id, auteur, message FROM tchat ORDER BY id DESC LIMIT 10';
    if ($debut != -1 || $limite != -1){
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }

    $requete = $this->db->query($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Tchat');
    $listeTchat = $requete->fetchAll();
    $requete->closeCursor();
    return $listeTchat;
  }


  public function getUnique($id){
    $requete = $this->db->prepare('SELECT id, auteur, message FROM tchat WHERE id = :id');
    $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Tchat');
    $tchat = $requete->fetch();
    return $tchat;
  }
}
