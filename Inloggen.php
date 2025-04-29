<?php
include 'view/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //zonder dit krijg je een melding van php. er wordt gevraagd naar een usernaame zonder dat je de formulier hebt ingevoerd
    $correctUsername = "Admin";
    $correctPassword = "1234";

    if ($_POST['username'] === $correctUsername && $_POST['password'] === $correctPassword) {
        session_start();
        $_SESSION['is_admin'] = true; // Sessie starten
        header("Location: profile"); // Doorsturen
        exit();

    } else {
        echo "Foutieve inloggegevens!";
    }

}
?>

<body>
<main>


<div class= "INLOG">
    <h2> Admin Log In</h2>

<form action="" method="POST">
    <label for="username>">username:</label>
    <input type="text" name="username" placeholder="Admin" required><br>
    <label for="username>">password:</label>
    <input type="password" name="password"  required><br>
    <button type="submit">Login</button>
</form>
</div>

</main>
</body>

<?php include 'view/footer.php'; ?>