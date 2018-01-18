<?php
/**
 * Created by PhpStorm.
 * User: kings
 * Date: 1/18/2018
 * Time: 1:31 PM
 */

    //Require the autoload file
    require_once('vendor/autoload.php');

    //Create an instance of the Base class
    $f3 = Base::instance();

    //Define a default route
    $f3->route('GET /', function() {
        $view = new View;
        echo $view->render('views/home.html');
    }
    );

    $f3->route('GET /pets/show/@pet', function($f3, $params) {
        switch($params['pet']) {
            case 'cat':
                echo "<img src='https://static.pexels.com/photos/177809/pexels-photo-177809.jpeg' alt='cat'>";
            case 'dog':
                echo "<img src='https://i.ytimg.com/vi/SfLV8hD7zX4/maxresdefault.jpg' alt='dog'>";
            //404 error
            default:
                $f3->error(404);
        }
    }
    );

    //Run fat free
    $f3->run();