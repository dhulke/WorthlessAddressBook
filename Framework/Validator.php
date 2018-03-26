<?php
namespace Framework;

class Validator {
    
    public static function validate($form, $rules) {
        
        foreach($rules as $field => $rule) {
            if(empty($form[$field]))
        }
    }
}