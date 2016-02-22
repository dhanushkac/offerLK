<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:53 AM
 */

class Redirect {
    public static function to($location  = null){
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include 'include/errors/404.php';
                        exit();
                        break;
                }
            }
            header('Location: ' . $location );
            exit();
        }
    }
}