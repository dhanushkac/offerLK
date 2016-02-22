<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:53 AM
 */

class Token {
    public static function generate(){
        return Session::put(Config::get('session/token_name'),md5(uniqid()));
    }

    public static function check($token){
        $tokenName = Config::get('session/token_name');
        if(Session::exists($tokenName) && $token === Session::get($tokenName)){
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}