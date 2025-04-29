<?php
$conn = include 'core/connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Nieuwe waarden ophalen van het formulier
        $name = $_POST['name'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        // Controleer of velden niet leeg zijn
        if (empty($email) || empty($name) || empty($comment)) {
            echo "Email, name and comment have to be filled.";
        } else {
            // Voorbereide query om SQL-injectie te voorkomen
            $sql = "UPDATE users SET name = :name, email = :email, comment = :comment WHERE id = :id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo "Update successful!";
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
            echo "User not found.";
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
    <title>Update User</title>
</head>
<body>

<div class="my-container my-mt-5">
    <h2>Update User</h2>
    <form method="post">
        <div class="my-form-group">
            <label class="my-form-label" for="name">Name</label>
            <input type="text" class="my-form-control" id="exampleInputName1" name="name" value="<?= htmlspecialchars($user['name']); ?>">
        </div>
        <div class="my-form-group">
            <label class="my-form-label" for="email">Email</label>
            <input type="email" class="my-form-control" id="exampleInputEmail1" name="email" value="<?= htmlspecialchars($user['email']); ?>">
        </div>
        <div class="my-form-group">
            <label class="my-form-label" for="comment">Comment</label>
            <input type="text" class="my-form-control" id="exampleInputComment1" name="comment" value="<?= htmlspecialchars($user['comment']); ?>">
        </div>
        <button type="submit" class="my-btn my-btn-primary">Update</button>
    </form>
</div>

</body>
</html>
