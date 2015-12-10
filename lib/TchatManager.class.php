<?php

abstract class TchatManager {

    abstract protected function add(Tchat $message);

    abstract protected function count();

    abstract protected function getList($debut = -1, $limite = -1);

    abstract protected function getUnique($id);

    public function save(Tchat $message){

        if($message->isValid()){
            $message->isNew() ? $this->add($message) : $this->update($message);
        }else {
            throw new RuntimeException('Le message doit être valide pour être enregistrée');
        }
    }
}
