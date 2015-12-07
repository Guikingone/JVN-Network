<?php
namespace JVNFram;

class Config extends ApplicationComponent{
    
    protected $vars = [];

    public function get($vars){
        if(!$this->vars){
            $xml = new \DOMDocument;
            $xml->load(__DIR__.'/../../JVN'.$this->app->name().'/Config/app.xml');
            
            $elements = $xml->getElementsByTagName('define');
            foreach($elements as $element){
                $this->vars[$elemen->getAttribute('vars')] = $element->getAttribute('value');
            }
        }
        if(isset($this->vars[$vars])){
            return $this->vars[$var];
        }
        return null;
    }
}