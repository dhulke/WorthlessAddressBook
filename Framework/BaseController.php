<?php
namespace Framework;


class BaseController {
    
    private $viewData = [];
    
    public function start($controllerActionParameters) {
    }
    
    public function finish() {
    }
    
    protected function setViewData($key, $value) {
        $this->viewData[$key] = $value;
    }
    
    protected function json($data) {
        return $this->response($data)->json();
    }
    
    protected function view($viewPath, $data = []) {
        $view = new View(VIEW_PATH);
        $render = $view->render($viewPath, array_merge($this->viewData, $data));
        return $this->response($render)->html();
    }
    
    protected function response($data = null) {
        return new Response($data);
    }
    
    protected function redirect($controllerAction, $flash = []) {
       foreach($flash as $type => $message)
           Flash::set($type, $message);
        return $this->response()->redirect(APP_URL . $controllerAction);
    }
}