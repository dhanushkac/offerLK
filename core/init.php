<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:54 AM
 */

session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'testprojectdb'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 6048000
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )

);

spl_autoload_register(function($class){
    require_once 'classes/'.$class.'.php';
});

require_once 'functions/sanitize.php';