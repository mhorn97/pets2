<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 1/18/2018
 * Time: 10:29 AM
 */

require_once ('vendor/autoload.php');

// Turn on error reporting
ini_set("display_errors", 1);
error_reporting(E_ALL);

$f3 = Base::instance();

//Set debug level
$f3->set('DEBUG', 3);

$f3 -> route('GET /', function() {
    echo "<h1>Routing Demo</h1>";
    $template = new Template();
    echo $template->render('views/home.html');

}
);


$f3 -> route('GET /pets/show/@pet', function($f3, $params) {
    switch($params['pet']) {
        case 'cat':
            echo 'Cat!'; break;
            echo '<img src="smiley.gif" alt="cat" height="42" width="42">';
        case 'bigcat':
            echo 'BIGCAT!'; break;
        case 'notcat':
            echo 'Not a cat!'; break;
        //404 error default
        default:
            $f3->error(404);
    }

}
);

$f3 -> route('GET /pets/order', function() {
    $template = new Template();
    echo $template->render('views/form1.html');
}
);



//Run Fat-Free Framework
$f3->run();