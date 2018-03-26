<?php
namespace Framework;

class View {
    
    private $root;
    private $suffix;
    private $prefix;
    private $data;
    
    public function __construct($root = null, $prefix = '', $suffix = '.view.php') {
        $this->root = $root === null ? dirname(__FILE__) : realpath($root);
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }
    
    public function render($viewPath, $data = []) {
        ob_start();
        include $this->getRealPath($viewPath);
        return ob_get_clean();
    }
    
    private function css($file) {
        echo CSS_URL . $file;
    }
    
    private function js($file) {
        echo JS_URL . $file;
    }
    
    private function url($parameters = '') {
        echo APP_URL . $parameters;
    }
    
    private function flashError() {
        echo Flash::getError();
    }
    
    private function getRealPath($viewPath) {
        $relativeViewPath = str_replace('.', DIRECTORY_SEPARATOR, $viewPath);
        $absolutePath = $this->root . DIRECTORY_SEPARATOR . $this->prefix . $relativeViewPath . $this->suffix;
        return $absolutePath;
    }
    
    private function import($viewPath, $data) {
        include $this->getRealPath($viewPath);
    }
}