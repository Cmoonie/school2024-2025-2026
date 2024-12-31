<?php
$uri = $_SERVER['REQUEST_URI'];

switch ($uri){


    case '/':
        require 'home.views.php';
        break;

    case'/create':
        require 'user.php';
        break;

    case '/display':
        require 'display.php';
        break;

    case '/update':
        require 'update.php';
        break;

        case '/delete':
            require 'delete.php';
            break;
}