<?php
/**
 * Created by PhpStorm.
 * User: michael horn
 * Date: 1/25/2018
 * Time: 11:40 AM
 */

function validColor($color)
{
    global $f3;
    return in_array($color,$f3->get('colors'));
}

function validString($string){
    if(!empty($string) && is_string($string))
    {
        return true;
    }
    else {
        return false;
    }
}

$errors = array();
$success = false;

if(!validColor($color) || !validString($name) || (!validString($type))) {
    $errors['name'] = "Please enter a valid name, type, and color";
} else {
    $success = true;
}