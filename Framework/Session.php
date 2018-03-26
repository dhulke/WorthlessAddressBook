<?php
namespace Framework;

class Session {
    
    public static function start() {
        session_start();
    }
    
    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }
    
    public static function remove($key) {
        if(isset($_SESSION[$key])) {
            $tempValue = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $tempValue;
        }
        return null;
    }
}