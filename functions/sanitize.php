<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 2/19/2016
 * Time: 11:55 AM
 */

function escape($string){
    return htmlentities($string,ENT_QUOTES,'UTF-8');
}