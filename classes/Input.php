<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:52 AM
 */

class Input {
    public static function exists($type = 'POST'){
        switch($type){
            case 'POST':
                return (!empty($_POST)) ? true : false;
            break;
            case 'GET':
                return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }

    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }elseif(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }

}