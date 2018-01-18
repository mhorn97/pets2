<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 1/18/2018
 * Time: 10:29 AM
 */

require_once ('vendor/autoload.php');

$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3 -> route('GET /', function() {
    echo "<h1>Routing Demo</h1>";
}
);
