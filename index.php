<?php
$uri = $_SERVER['REQUEST_URI'];

switch ($uri){


    case '/':
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