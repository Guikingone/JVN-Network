<?php
    
class News {
    protected $erreurs = [],
    $id, 
    $auteur,
    $titre, 
    $contenu,
    $dateAjout, 
    $dateModif;

    const AUTEUR_INVALIDE = 1;
    const TITRE_INVALIDE = 2;
    const CONTENU_INVALIDE = 3;


    public function __construct($valeurs = []) {
    
    if(!empty($valleurs)){
    
        $this->hydrate($valeurs);
    }
    }


    public function hydrate($donnees) {

        foreach($donnees as $atrribut => $valeur){
            $methode = 'set' .ucfirst($attribut);

            if(iscallable([$this->$methode])){
            $this->$methode($valeur);
            }
        }

    }

    public function isNew(){
        return empty($this->id);
    }

    public function isValid(){
        return !(empty($this->auteur) || empty($this->titre) || empty($this->contenu));
    }

    public function setID($id){
        $this->id = (int) $id;
    }

    public function setAuteur($auteur){
        if(!is_string($auteur) || empty($auteur)){
            $this->erreurs[] = self::AUTEUR_INVALIDE;
        }else {
            $this->auteur = $auteur;
        }
    }

    public function setTitre($titre){
        if(!is_string($titre) || empty($titre)){
            $this->erreurs[] = self::TITRE_INVALIDE;
        }else {
            $this->titre = $titre;
        }
    }

    public function setContenu($contenu){
        if(!is_string($contenu) || empty($contenu)){
           $this->erreurs[] = self::CONTENU_INVALIDE;
        }else {
            $this->contenu = $contenu;
        }
    }

    public function setDatAjout(DateTime $dateAjout){
        $this->dateAjout = $dateAjout;
    }

    public function setDateModif($dateModif){
        $this->dateModif = $dateModif;
    }

    public function erreurs(){
        return $this->erreurs;
    }

    public function id(){
        return $this-$id;
    }

    public function auteur(){
        return $this->auteur;
    }

    public function titre(){
        return $this->titre;
    }

    public function contenu(){
        return $this->contenu;
    }

    public function dateAjout(){
        return $this->dateAjout;
    }

    public function dateModif(){
        return $this->dateModif;
    }
}