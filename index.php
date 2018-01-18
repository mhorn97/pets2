<?php
/**
 * Created by PhpStorm.
 * User: micha
 * Date: 1/18/2018
 * Time: 10:29 AM
 */

require_once ('vendor/autoload.php');

session_start();

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
            echo '<img src="https://static.pexels.com/photos/127028/pexels-photo-127028.jpeg" alt="cat" height="42" width="42">';
        case 'bigcat':
            echo 'BIGCAT!'; break;
            echo '<img src="https://img.buzzfeed.com/buzzfeed-static/static/2014-04/enhanced/webdr06/4/16/enhanced-10419-1396642697-10.jpg" alt="cat" height="42" width="42">';
        case 'notcat':
            echo 'Not a cat!'; break;
        //404 error default
        default:
            $f3->error(404);
    }

}
);

$f3 -> route('GET /order', function() {
    $template = new Template();
    echo $template->render('views/form1.html');
}
);

$f3 -> route('POST /order2', function($f3,$params) {
    $f3->set('pet',$params['pet']);
    $_SESSION['pet'] = $f3->get('pet');
    $template = new Template();
    echo $template->render('views/form2.html');
}
);

$f3 -> route('POST /results', function($f3,$params) {
    $f3 -> set('color',$params['color']);
    $_SESSION['color'] = $f3->get('color');
    $template = new Template();
    echo $template->render('views/results.html');
});


//Run Fat-Free Framework
$f3->run();