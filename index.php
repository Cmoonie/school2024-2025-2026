<?php
$uri = $_SERVER['REQUEST_URI'];

switch ($uri){


    case '/':
        require 'home.views.php';
        break;

    case'/create':
        require 'user.php';
        break;

    case '/profile':
        require 'profile.php';
        break;

    case '/update':
        require 'update.php';
        break;

        case '/delete':
            require 'delete.php';
            break;

    case '/contact':
        require 'contact.php';
        break;

    case '/about':
        require 'about.php';
        break;

        case '/login':
            require 'inloggen.php';
            break;

    case '/present':
        require 'presentation.php';
        break;
}