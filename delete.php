<?php

$conn = include 'connection.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Voorbereide query om SQL-injectie te voorkomen
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);


    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Record succesvol verwijderd!";

        header('Location: display.php');
        exit();
    } else {

        echo "Error: " . implode(", ", $stmt->errorInfo());
    }
}

