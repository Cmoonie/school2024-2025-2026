<?php


// Vereenvoudigde functie om verbinding te maken met de database

$servername = "localhost";
$username = "root";
$password = "Gloria";
$dbname = "profileapp";

// Probeer verbinding te maken en controleer of dit succesvol is
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn->query("SELECT 1")) {

    error_log('Databaseverbinding is succesvol');
} else {
    error_log("Connection failed: " . $conn->errorInfo()[2]);
    echo "Databaseverbinding mislukt.";
    $conn = false;
}

return $conn;






