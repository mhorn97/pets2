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
$f3->set('colors',array('pink','green','blue'));

//Set debug level
$f3->set('DEBUG', 3);

$f3 -> route('GET /', function() {
    echo "<h1>Routing Demo</h1>";
    $template = new Template();
    echo $template->render('views/home.html');

}
);


$f3 -> route('GET /show/@pet', function($f3, $params) {
    switch($params['pet']) {
        case 'cat':
            echo 'Cat!';
            echo '<img src="https://static.pexels.com/photos/127028/pexels-photo-127028.jpeg" alt="cat">';
            break;
        case 'bigcat':
            echo 'BIGCAT!';
            echo '<img src="https://img.buzzfeed.com/buzzfeed-static/static/2014-04/enhanced/webdr06/4/16/enhanced-10419-1396642697-10.jpg" alt="cat">';
            break;
        case 'notcat':
            echo 'Not a cat!';
            break;
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

$f3 -> route('POST /order2', function() {
    $_SESSION['pet'] = $_POST['pet'];
    $template = new Template();
    echo $template->render('views/form2.html');
}
);

$f3 -> route('POST /results', function($f3) {

    $_SESSION['color'] = $_POST['color'];
    $f3->set('pet', $_SESSION['pet']);
    $f3 -> set('color', $_SESSION['color']);

    $template = new Template();
    echo $template->render('views/results.html');
});

$f3->route('GET|POST /new-pet', function($f3)
{
    if(isset($_POST['submit']))
    {
        $color = $_POST['pet-color'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $success = $_POST['success'];
        $errors = $_POST['errors'];

        include('model/validate.php');
    }
    $f3->set('color',$color);
    $f3->set('type',$type);
    $f3->set('name',$name);
    $f3->set('success',$success);
    $f3->set('errors',$errors);
    $template = new Template();
    echo $template->render('views/finalForm.html');
});


//Run Fat-Free Framework
$f3->run();