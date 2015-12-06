<?php
namespace JVNFram;

abstract class Application{
    
    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    public function __construct(){
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->name = '';
    }

    abstract public function run();

    public function httpRequest(){
        return $this->httpRequest;
    }

    public function httpRespond(){
        return $this->httpResponse;
    }

    public function name(){
        return $this->name;
    }

}