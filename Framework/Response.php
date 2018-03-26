<?php
namespace Framework;

class Response {
    
    private $data;
    private $prefixData;
    private $suffixData;
    
    public function __construct($data = null) {
        $this->data = $data;
    }
    
    public function prefixData($data) {
        $this->prefixData = $data;
    }
    
    public function suffixData($data) {
        $this->suffixData = $data;
    }
    
    public function with($headers) {
        foreach($headers as $key => $value)
            header("$key:$value");
        return $this;
    }
    
    public function html($charset = 'utf-8') {
        header("Content-Type: text/html; charset=$charset");
        return $this;
    }
    
    public function json($charset = 'utf-8') {
        header("Content-Type: application/json; charset=$charset");
        
        if(!is_string($this->data))
            $this->data = json_encode($this->data);
        
        return $this;
    }
    
    public function plain($charset = 'utf-8') {
        header("Content-Type: text/plain; charset=$charset");
        return $this;
    }
    
    public function redirect($url) {
        header("Location: $url", true, 301);
        return $this;
    }
    
    public function send() {
        echo $this->prefixData . $this->data . $this->suffixData;
    }
}