<?php
namespace Framework;

class Router {
   
    private $url;
    private $defaultControllerNamespace = '\App\Controller';
    private $defaultIndexController = 'Index';
    private $defaultIndexAction = 'index';
    private $controllerSuffix = 'Controller';
    private $actionSuffix = 'Action';
    //Add more options like controller/action prefix
    
    public function __construct($url) {
        $this->url = $url;
    }
    
    public function getRoute() {
        
        $url_parts = explode('/', $this->url);
        
        $fullyQualifiedControllerName = $this->getFullyQualifiedControllerName($url_parts);
        $fullyQualifiedActionName = $this->getFullyQualifiedActionName($url_parts);
        $parameters = $this->getParameters($url_parts);
        
        return [$fullyQualifiedControllerName, $fullyQualifiedActionName, $parameters];
    }
    
    private function getFullyQualifiedControllerName($url_parts) {
        $controller = empty($url_parts[1]) ? $this->defaultIndexController : $url_parts[1];
        $fullyQualifiedControllerName = $this->defaultControllerNamespace . "\\$controller{$this->controllerSuffix}";
        return $fullyQualifiedControllerName;
    }
    
    private function getFullyQualifiedActionName($url_parts) {
        $httpMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $methodSuffix = $httpMethod !== 'get' ? "_$httpMethod" : '';
        $action = empty($url_parts[2]) ? $this->defaultIndexAction : $url_parts[2];
        $fullyQualifiedActionName = "$action{$this->actionSuffix}$methodSuffix";
        return $fullyQualifiedActionName;
    }
    
    private function getParameters($url_parts) {
        return count($url_parts) > 3 ? array_slice($url_parts, 3) : [];
    }
}