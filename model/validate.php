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

if(!validColor($color))
{
    $errors['color']="Please enter a valid color.";
}
else
{
    $success=sizeOf($errors) == 0;
}