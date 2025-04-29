<?php
$conn= include 'core/connection.php';


$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!--Dit is pagina is voor show.-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cecilia's Portfolio</title>
    <link rel="stylesheet" href="/public/css/stylesheet.css">

</head>
<body>
<header class="nav">
    <a href="logout.php">Logout</a>

</header>
<main>


<!--    <section class="mainprofile">-->
<div class="my-container">
    <button class="my-btn my-btn-primary "><a href="user.php" style="color: white; text-decoration: none;">Add contact</a>
       </button>
    <table class="my-table">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Comment</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>


        <tbody>

            <?php foreach ($users as $user): ?>
                <tr>
<!--                    <th scope="row">--><?php //= $user['id']; ?><!--</th>-->
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['comment']); ?></td>
                    <td>
                        <button class="my-btn my-btn-primary">
                            <a href="update.php?updateid=<?= $user['id']; ?>" style= "color: white; text-decoration: none;">Update</a>
                        </button>
                    </td>
                    <td>
                        <button class="my-btn my-btn-danger">
                            <a href="delete.php?deleteid=<?= $user['id']; ?>" style= "color: white; text-decoration: none;">Delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>


<!--    </section>-->




</main>
<?php include "view/footer.php"; ?>
</body>
</html>

