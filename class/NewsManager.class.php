<?php
    
abstract class NewsManager {

    abstract protected function add(News $news);

    abstract protected function count();

    abstract protected function delete($id);

    abstract protected function getList($debut = -1, $limite = -1);

    abstract protected function getUnique($id);

    public function save(News $news){
    
        if($news->isValid()){
            $news->isNews() ? $this->add($news) : $this->update($news);
        }else {
            throw new RuntimeException('La news doit être valide pour être enregistrée');
        }
    }

    abstract protected function update(News $news);
 
}