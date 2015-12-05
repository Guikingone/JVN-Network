<?php
class NewsManagerMySQLi extends NewsManager{

    protected $db;
    

    public function __construct(MySQLi $db){
        $this->db = $db;
    }

    protected function add(News $news){
        $requete = $this->db->prepare('INSERT INTO news SET auteur = ?, titre = ?, contenu = ?, dateAjout = NOW(), dateModif = NOW()');
        
        $requete->bind_param('sss', $news->auteur(), $news->titre(), $news->contenu());
        
        $requete->execute();
    }

    public function count(){
        return $this->db->query('SELECT id FROM news')->num_rows;
    }

    public function delete($id){
        $id = (int) $id;
        
        $requete = $this->db->prepare('DELETE FROM news WHERE id = ?');
        
        $requete->bind_param('i', $id);
        
        $requete->execute();
    }

    public function getList($debut = -1, $limite = -1){
        $listeNews = [];
        
        $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news ORDER BY id DESC';
        
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }
        
        $requete = $this->db->query($sql);
        
        while ($news = $requete->fetch_object('News'))
        {
            $news->setDateAjout(new DateTime($news->dateAjout()));
            $news->setDateModif(new DateTime($news->dateModif()));

            $listeNews[] = $news;
        }
        
        return $listeNews;
    }

    public function getUnique($id){
        $id = (int) $id;
        
        $requete = $this->db->prepare('SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM news WHERE id = ?');
        $requete->bind_param('i', $id);
        $requete->execute();
        
        $requete->bind_result($id, $auteur, $titre, $contenu, $dateAjout, $dateModif);
        
        $requete->fetch();
        
        return new News([
          'id' => $id,
          'auteur' => $auteur,
          'titre' => $titre,
          'contenu' => $contenu,
          'dateAjout' => new DateTime($dateAjout),
          'dateModif' => new DateTime($dateModif)
        ]);
    }

    protected function update(News $news){
        $requete = $this->db->prepare('UPDATE news SET auteur = ?, titre = ?, contenu = ?, dateModif = NOW() WHERE id = ?');
        
        $requete->bind_param('sssi', $news->auteur(), $news->titre(), $news->contenu(), $news->id());
        
        $requete->execute();
    }
}