<?php

//$conn = require_once('Core/DatabaseConnection.php');
require 'Model/HomeModel.php';

function create()
{
    $conn = require('Core/DatabaseConnection.php');
    $email = $_POST ['email'];
    $name = $_POST['name'];
//    $id = $_POST ['id'];

    if (!empty($name) && !empty($email)) {
        if ($name == '') echo 'leeg'
            && ($email == '');
        echo 'leeg';
        // Voeg gebruiker toe via het model

//        var_dump($name . " " . $email);
        addUser($conn, $email, $name);
        echo "Gebruiker succesvol toegevoegd!";
    } else {
        echo "Alle velden zijn verplicht!";
    }
    return  0;
}


function update()
{
    $conn = require('Core/DatabaseConnection.php');
    $email = $_POST ['email'];
    $name = $_POST['name'];
    $error = "";

    // validate
    if(empty($name)) $error = 'Naam is leeg.  ';
    if(empty($email)) $error .= 'Email is leeg.';
    else if (!str_contains($email, '@'))
        $error .= 'Email is ongeldig.';

    if (!empty($error)) {
        $error .= " Alle velden zijn verplicht!";
        require __DIR__ . '/../../views/profile.views.php';
        exit;
    }

    $id = ['id'];
    updateUser($conn, $id, $email, $name);
    $error =  "Gebruiker succesvol toegevoegd!";
// Laad de view
//    require __DIR__ . '/../../views/profile.views.php';
}


function read()
{
    $conn = require('Core/DatabaseConnection.php');

//// Haal gegevens op uit het formulier
//if (isset($_POST['submit'])) {
//    $name = ($_POST['name']);
//    $email = ($_POST['email']);

// Haal alle gebruikers op uit de database
    $sql = "SELECT * FROM users";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
function delete()
{
    $conn = require('Core/DatabaseConnection.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];


        deleteUser($conn, $id);
        echo "Gebruiker succesvol verwijderd!";
    } else {
        echo "Er ging iets mis bij het verwijderen van de gebruiker.";
    }

}

