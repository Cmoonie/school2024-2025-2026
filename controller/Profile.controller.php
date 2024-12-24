<?php

$conn = require_once "Core\DatabaseConnection.php";

//require_once "Model/HomeModel.php";
//$conn = GetConnection();

$params = $_GET;

$action = $params["action"] ?? 'index';

switch ($action) {
    case 'index':
        $users = ReadUsers($conn);
        break;
    case 'update':
       $id = $_POST["id"] ?? '';
       $email = $_POST["email"] ?? '';
       $name = $_POST["name"] ?? '';

        $users = UpdateUser($conn);
        break;
}
//$users = DeleteUsers($conn);
//$users = CreateUsers($conn);

// Stuur de gebruikers naar de view
include 'views/profile.views.php';

?>









