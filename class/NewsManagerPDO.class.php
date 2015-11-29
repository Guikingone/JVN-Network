<?php
    
class NewsManagerPDO extends NewsManager{
    
    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

      protected function add(News $news)
  {
    $requete = $this->db->prepare('INSERT INTO news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateAjout = NOW(), dateModif = NOW()');
    
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':auteur', $news->auteur());
    $requete->bindValue(':contenu', $news->contenu());
    
    $requete->execute();
  }
  

  public function count()
  {
    return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }
 

  public function delete($id)
  {
    $this->db->exec('DELETE FROM news WHERE id = '.(int) $id);
  }
  

  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1){
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->db->query($sql);
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
    
    $listeNews = $requete->fetchAll();

    foreach ($listeNews as $news)
    {
      $news->setDateAjout(new DateTime($news->dateAjout()));
      $news->setDateModif(new DateTime($news->dateModif()));
    }
    
    $requete->closeCursor();
    
    return $listeNews;
  }
  

  public function getUnique($id)
  {
    $requete = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news WHERE id = :id');
    $requete->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $requete->execute();
    
    $requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');

    $news = $requete->fetch();

    $news->setDateAjout(new DateTime($news->dateAjout()));
    $news->setDateModif(new DateTime($news->dateModif()));
    
    return $news;
  }


  protected function update(News $news)
  {
    $requete = $this->db->prepare('UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
    
    $requete->bindValue(':titre', $news->titre());
    $requete->bindValue(':auteur', $news->auteur());
    $requete->bindValue(':contenu', $news->contenu());
    $requete->bindValue(':id', $news->id(), PDO::PARAM_INT);
    
    $requete->execute();
  }
}