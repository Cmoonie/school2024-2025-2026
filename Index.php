<?php

require 'controller/crud.controller.php';

//$uri = $_SERVER['REQUEST_URI'];
$uri = $_SERVER['PATH_INFO'] ?? '/';

Switch($uri) {

    case '/':
        require 'views/Home.views.php';
        break;

    case '/about':
        require "views/about.views.php";
        break;

     case '/contact':
         require "views/contact.views.php";
         break;

    case '/profile':
        include 'controller/profile.controller.php';
        break;

      case '/profile/add':
          create();
          break;

      case '/profile/update':
          update();
          break;

       case '/profile/delete':
           delete();
           break;
    default:
        http_response_code(404);
      header ("https://www.google.com/search?q=routing+error");
}













