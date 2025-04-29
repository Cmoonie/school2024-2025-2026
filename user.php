<?php
$conn= include 'core/connection.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    if (empty($email) || empty($name) || empty($comment)) {
        echo "Email, name and comment have to be filled.";
} else

    if ($conn) {
        // Voorbereiden van de SQL-query
        $sql = "INSERT INTO users (name, email, comment) VALUES (:name, :email, :comment)";
        $stmt = $conn->prepare($sql);

        // Parameters binden
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':comment', $comment);


        if ($stmt->execute()) {
            header("location: profile.php");
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
</head>
<body>
<div class="my-container">
    <form method="post">
        <div class="my-form-group">
            <label class="my-form-label" for="name">Name</label>
            <input type="text" class="my-form-control" id="exampleInputName1" name="name">
        </div>
        <div class="my-form-group">
            <label class="my-form-label" for="email">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
            <div id="email" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="my-form-group">
            <label class="my-form-label" for="comment">Comment</label>
            <input type="text" class="form-control" id="exampleInputComment1" name="comment">
        </div>

        <button type="submit" class="my-btn my-btn-primary" name="submit">Submit</button>
    </form>
</div>
<h1>Welkom op mijn portfolio</h1>

</body>
</html>
