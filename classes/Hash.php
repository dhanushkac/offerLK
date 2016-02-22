<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:52 AM
 */

class Hash {
    public static function make($string, $salt = ''){
        return hash('sha256', $string.$salt);
    }

    public static function salt($length){
        return mcrypt_create_iv($length);
    }

    public static function unique(){
        return self::make(uniqid());
    }
}