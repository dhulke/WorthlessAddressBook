<?php
namespace Framework;

class Auth {
    
    const AUTH_ID_LABEL = 'auth_id';
    
    public static function login($id, $user) {
        Session::set(self::AUTH_ID_LABEL, $id);
    }
    
    public static function check() {
        return Session::get(self::AUTH_ID_LABEL, null) !== null;
    }
    
    public static function getId() {
        return Session::get(self::AUTH_ID_LABEL);
    }
    
    public static function logout() {
        Session::remove(self::AUTH_ID_LABEL);
    }
}