<?php
namespace Framework;

class Flash {
    
    const ERROR = 'flash_error';
    
    public static function set($type, $message) {
        Session::set($type, $message);
    }
    
    public static function get($type) {
        return Session::remove($type);
    }
    
    public static function setError($message) {
        Session::set(self::ERROR, $message);
    }
    
    public static function getError() {
        return Session::remove(self::ERROR);
    }
    
}