<?php
/**
 * Created by PhpStorm.
 * User: kings
 * Date: 1/18/2018
 * Time: 1:31 PM
 */
    session_start();

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
                echo "<img src='https://static.pexels.com/photos/177809/pexels-photo-177809.jpeg' alt='cat'><br>"; break;
            case 'dog':
                echo "<img src='https://i.ytimg.com/vi/SfLV8hD7zX4/maxresdefault.jpg' alt='dog'><br>"; break;
            //404 error
            default:
                $f3->error(404);
        }
    }
    );

    $f3->route('GET /order', function ()
    {
        $template = new Template();
        echo $template->render('views/form1.html');
    }
    );

    $f3->route('POST /order2', function ()
    {
        $_SESSION['animal'] = $_POST['animal'];

//        echo $_SESSION['animal'];
//        echo $_POST['animal'];

        $template = new Template();
        echo $template->render('views/form2.html');
    }
    );

    $f3->route('POST /results', function ($f3, $params)
    {
        $_SESSION['color'] = $_POST['color'];

        $f3->set('animal', $_SESSION['animal']);

        $f3->set('color', $_SESSION['color']);

        $template = new Template();
        echo $template->render('views/result.html');

    }
    );



    //Run fat free
    $f3->run();