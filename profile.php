<?php
$conn= include 'core/connection.php';


$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

<!--    --><?php
//    if (!empty($error)) { echo $error; }
//    ?>
</header>

<!- Start Main --->-->
<!--<main>-->
<!--    <aside class="SidebarLeft">-->
<!--        <div style="text-align: center">-->
<!--            <img src="./public/photo/thumbnail_IMG_1194.jpg" height="200" width="200" border="3" alt="picture of a woman"/>-->
<!--            <br><br>-->
<!--            <ul style="list-style-type:none;">-->
<!--                <li>Naam: Cecilia Anim</li>-->
<!--                <li>Leeftijd: 31 jaar</li>-->
<!--                <li>Woonplaats: Amsterdam</li>-->
<!--                <li>Beroep: Junior Software Developer</li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </aside>-->

    <section class="mainprofile">
<div class="container">
    <button class="btn btn-primary my=5"><a href="user.php" class="text-light">Add contact</a>
       </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
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
                    <th scope="row"><?= $user['id']; ?></th>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td><?= htmlspecialchars($user['comment']); ?></td>
                    <td>
                        <button class="btn btn-primary">
                            <a href="update.php?updateid=<?= $user['id']; ?>" class="text-light">Update</a>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger">
                            <a href="delete.php?deleteid=<?= $user['id']; ?>" class="text-light">Delete</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>


    </section>
<!--    <aside class="SidebarRight">-->
<!--        <p>Landen/Steden waar ik in de toekomst wil werken:</p>-->
<!--        <ul>-->
<!--            <li>Amsterdam&#128204;</li>-->
<!--            <li>Portugal</li>-->
<!--            <li>Haarlem&#128204;</li>-->
<!--            <li>Vancouver</li>-->
<!--            <li>Thailand&#128204;</li>-->
<!--            <li>Almere</li>-->
<!--            <li>Mexico</li>-->
<!--        </ul>-->
<!--        <br><hr><br>-->
<!--        <p>Programmeertalen waar ik ervaring mee hebt&#128337;:</p>-->
<!--        <ul>-->
<!--            <li>HTML</li>-->
<!--            <li>CSS</li>-->
<!--            <li>PHP</li>-->
<!--        </ul>-->
<!--    </aside>-->
</main>

<?php include "view/footer.php"; ?>
</body>
</html>
</body>
</html>

