<?php
$conn= include 'connection.php'; // Zorg ervoor dat het pad klopt naar je connection.php bestand

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];

if (empty($email) || empty($name)) {
    echo "Email en naam moeten beide ingevuld zijn.";
} else
    // Controleer of $conn beschikbaar is
    if ($conn) {
        // Voorbereiden van de SQL-query
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $conn->prepare($sql);

        // Parameters binden
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);

        // Query uitvoeren en controleren op succes
        if ($stmt->execute()) {
            header("location: display.php");
        } else {
            // Haal foutinformatie op als de query faalt
            echo "Error: " . implode(", ", $stmt->errorInfo());
        }
    } else {
        echo "Verbindingsfout: Er is geen verbinding met de database.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud operations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">name</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <div id="email" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>
<h1>Welkom op mijn website!</h1>
<p>Dit is een paragraaf tekst.</p>
</body>
</html>
