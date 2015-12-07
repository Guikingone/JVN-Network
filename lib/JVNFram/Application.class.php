<?php
namespace JVNFram;

abstract class Application{
    
    protected $httpRequest;
    protected $httpResponse;
    protected $name;
    protected $user;
    protected $config;

    public function __construct(){
        $this->httpRequest = new HTTPRequest($this);
        $this->httpResponse = new HTTPResponse($this);
        $this->name = '';
        $this->user = new User($this);
        $this->config = new Config($this);
    }

    public function getController(){
        $router = new Router;
        $xml = new \DOMDocument;
        $xml->load(__DIR__.'/../../JVN/'.$this->name.'/Config/routes.xml');
        $routes = $xml->getElementsByTagName('route');

        foreach($routes as $route){
            $vars = [];

            if($route->hasAttribute('vars')){
                $vars = explode(',', $route->getAttribute('vars'));
            }

            $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
        }

            try{
            $matchedRoute = $router->getRoute($this->httpRequest->requestURL());
            }
            catch (\RuntimeException $e){
                if($e->getCode() == Router::NO_ROUTE){
                    $this->httpResponse->redirect404();
                }
            }

            $_GET = array_merge($_GET, $matchedRoute->vars());

            $controllerClass = 'JVN\\'.$this->name.'\\Modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
            return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
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