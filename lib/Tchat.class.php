<?php
class Tchat{

        protected $erreurs = [];
        protected $id;
        protected $auteur;
        protected $message;

        const AUTEUR_INVALIDE = 1;
        const MESSAGE_INVALIDE = 2;

        public function __construct($valeurs = []){
        if(!empty($valeurs)){
          $this->hydrate($valeurs);
        }
        }

        public function hydrate($donnees){
          foreach($donnees as $attribut => $valeur){
            $methode = 'set'.ucfirst($attribut);
            if(is_callable([$this, $methode])){
              $this->$methode($valeur);
            }
          }
        }

        public function isNew(){
          return empty($this->id);
        }

        public function isValid(){
          return !(empty($this->auteur) || empty($this->message));
        }

        public function setId($id){
          $this->id = (int) $id;
        }

        public function setAuteur($auteur){
          if(!is_string($auteur) || empty($ateur)){
            $this->erreurs[] = self::AUTEUR_INVALIDE;
          }else{
            $this->auteur = $auteur;
          }
        }

        public function setmessage($message){
          if(!is_string($message) || empty($message)){
            $this->erreurs[] = self::MESSAGE_INVALIDE;
          }else {
            $this->message = $message;
          }
        }

        public function id(){
          return $this->id;
        }

        public function auteur(){
          return $this->auteur;
        }

        public function message(){
          return $this->message;
        }

    }
