<?php
$conn = include 'core/connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Nieuwe waarden ophalen van het formulier
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Controleer of velden niet leeg zijn
        if (empty($name) || empty($email)) {
            echo "Naam en email mogen niet leeg zijn.";
        } else {
            // Voorbereide query om SQL-injectie te voorkomen
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Record succesvol bijgewerkt!";
                header('Location: profile.php');
                exit();
            } else {
                echo "Error: " . implode(", ", $stmt->errorInfo());
            }
        }
    } else {
        // Haal bestaande gegevens op om in het formulier weer te geven
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "Gebruiker niet gevonden.";
            exit();
        }
    }
} else {
    echo "Geen ID opgegeven.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Gebruiker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Update Gebruiker</h2>
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Naam</label>
            <input type="text" class="form-control" id="exampleInputName1" name="name" value="<?= htmlspecialchars($user['name']); ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?= htmlspecialchars($user['email']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
