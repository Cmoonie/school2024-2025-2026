<?php
$uri = $_SERVER['REQUEST_URI'];

Switch($uri) {

    case '/':
        require "views/home.views.php";


    case '/inloggen':
        require "views/inloggen.views.php";
    }
?>
