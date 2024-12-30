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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <button class="btn btn-primary my=5"><a href="user.php" class="text-light">Add user</a>
       </button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>

        </tr>
        </thead>
<td><button><a href=" "> Update</a> </button>
</td>

        <tbody>

            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row"><?= $user['id']; ?></th>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
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
</body>
</html>

