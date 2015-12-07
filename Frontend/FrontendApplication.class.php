<?php
    
namespace JVN\Frontend;

use \JVNFram\Application;

class FrontendApplication extends Application{

    public function __construct(){
        parent::__construct();
        $this->name ='Frontend';
    }

    public function run(){
        $controller = $this->getController();
        $controller->execute();

        $controller->httpResponse->setPage($controller->page());
        $controller->httpResponse->send();
    }

}