<?php
namespace Framework;

class Executor {
    
    private $controller;
    private $action;
    private $parameters;
    
    public function __construct($controller, $action, $parameters) {
        $this->controller = $controller;
        $this->action = $action;
        $this->parameters = $parameters;
    }
    
    public function run() {
        
        $controllerInstance = new $this->controller;
        
        if(!($controllerInstance instanceof BaseController))
            throw new \Exception('Controller must inherit from Framework\BaseController');
        
        $response = call_user_func([$controllerInstance, 'start'], [$this->controller, $this->action, $this->parameters]);
        
        if($response instanceof Response) {
            var_dump("lalalallaa");
            die();
            return $response->send();
        }
        
        $response = call_user_func_array([$controllerInstance, $this->action], $this->parameters);
        
        if($response instanceof Response)
            $response->send();
        
        $response = call_user_func([$controllerInstance, 'finish']);
        
        if($response instanceof Response)
            $response->send();
    }
}