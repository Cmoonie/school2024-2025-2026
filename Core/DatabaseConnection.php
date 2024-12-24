<?php

//function GetConnection()

    $servername = "localhost";
    $username = "root";
    $password = "Gloria";
    $dbname = "profileapp";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->query("SELECT 1");

//        if ($stmt) {
//        var_dump($conn);
//        echo "Databaseverbinding is succesvol!";}
//        return $conn;


//        echo "status=".$conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
//        echo "info=".$conn->getAttribute(PDO::ATTR_SERVER_INFO);
//        echo "Connected successfully";
    } catch (PDOException $e) {
        error_log( "Connection failed: " . $e->getMessage());
        return false;
    }

    return $conn;
