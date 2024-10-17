<?php
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
}

