<?php
require 'core/Connection.php';

$uri = strtolower($_SERVER['REQUEST_URI']);

Switch($uri) {

    case '/':
        require "views/home.views.php";
        break;
    case '/inloggen':
        require "views/inloggen.views.php";
        break;
    case '/profile':
        require "views/profile.views.php";
        break;

    case '/portfolio':
        require "views/portfolio.views.php";
        break;

        case '/about':
            require "views/about.views.php";
            break;


    case '/contact':
        require "views/contact.views.php";
        break;

    case '/uitloggen':
        require "views/uitloggen.views.php";
}

//$conn = new Connection();
//die(var_dump($conn));

