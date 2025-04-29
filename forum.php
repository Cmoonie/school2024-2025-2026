<?php
include 'view/header.php';
$conn = include 'core/connection.php';

// Eerst: formulier verwerken
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];

    if (empty($email) || empty($name) || empty($comment)) {
        echo "Email, name and comment have to be filled.";
    } else {
        if ($conn) {
            $sql = "INSERT INTO users (name, email, comment) VALUES (:name, :email, :comment)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':comment', $comment);

            if ($stmt->execute()) {
                header("Location: forum.php");
                exit();
            } else {
                echo "Error: " . implode(", ", $stmt->errorInfo());
            }
        } else {
            echo "Verbindingsfout: Er is geen verbinding met de database.";
        }
    }
}

// Daarna: altijd de users ophalen
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<main>
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


    <div class="my-container">
    <?php foreach ($users as $user): ?>
            <div class="comment-box">

            <p><strong><?= htmlspecialchars($user['name']); ?></strong></p>
            <p><?= htmlspecialchars($user['comment']); ?></p>


        </div>
    <?php endforeach; ?>

    </div>





</main>
<?php
include 'view/footer.php';
?>
