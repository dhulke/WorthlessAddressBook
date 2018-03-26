<?php
namespace Framework;

class Crypt {
    
    public static function generateSalt() {
        return uniqid(mt_rand(), true);
    }
    
    public static function hashPassword($password, $salt) {
        return md5($password . $salt);
    }
    
    public static function getHashedPasswordAndSalt($password) {
        $salt = self::generateSalt();
        return [self::hashPassword($password, $salt), $salt];
    }
}