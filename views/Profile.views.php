
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CinkedIN</title>
    <link rel="stylesheet" href="/Public/CSS/stylesheets.css">
</head>
<body>

<!--- Start header --->

<header class="nav">
    <a class="active" href="/">Home</a>
    <a href="/uitloggen">Uitloggen</a>
    <?php
        if (!empty($error)) { echo $error; }
    ?>
</header>

<!--- Start Main --->
<main>
    <aside class="SidebarLeft">
        <div style="text-align: center">
            <img src="../Public/Photos/thumbnail_IMG_1194.jpg" height="200" width="200" border="3" alt="picture of a woman"/>
            <br><br>
            <ul style="list-style-type:none;">
                <li>Naam: Cecilia Anim</li>
                <li>Leeftijd: 31 jaar</li>
                <li>Woonplaats: Amsterdam</li>
                <li>Beroep: Junior Software Developer</li>
            </ul>
        </div>
    </aside>

    <section class="mainprofile">
        <h3>Welkom op je profielpagina</h3>
        <p>Hier vind je je projectinformatie en gebruikersgegevens.</p>


        <!-- Gebruikerslijst -->
        <form action="/profile/add" method="POST">
            <input type="hidden" name="action" value="add">
<!--            <input type="hidden" name="debug" value="test">-->
            <label for="name">name:</label><br>
            <input type="text" id="name" name="name" value=""><br>
            <label for="email">email:</label><br>
            <input type="text" id="email" name="email" value="@windesheim.nl"><br><br>
            <input type="submit" value="Add">
        </form>

        <br>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (!empty($users)) {
                    foreach ($users as $user) { ?>
            <tr>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td>
                    <form action="/profile/update" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                        <input type="hidden" name="email" value="john.doe@example.com">
                        <input type="hidden" name="name" value="update">
                        <button type="submit">Update</button>
                    </form>
                    <form action="profile/delete" method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="name" value="<?= htmlspecialchars($user['id']) ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

                <?php } } else { ?>
            <tr>
                <td colspan="3">Geen gebruikers gevonden.</td>
            </tr>
            <?php } ?>
            </tbody>
        </table>



        <!--        <br><hr><br>-->

    </section>

    <aside class="SidebarRight">
        <p>Zoekresultaten binnen 30km:</p>
        <ul>
            <li>Amsterdam&#128204;</li>
            <li>Osdorp</li>
            <li>Haarlem&#128204;</li>
            <li>Hilversum</li>
            <li>Utrecht&#128204;</li>
            <li>Almere</li>
            <li>Hoofddorp</li>
        </ul>
        <br><hr><br>
        <p>Laatst bekeken vacatures&#128337;:</p>
        <ul>
            <li>Junior software Developer bij Star Appel, Haarlem</li>
            <li>Junior software Developer bij Opus Recruitment Solutions, Amsterdam Hybrid</li>
            <li>Junior software Developer bij Comaen, Utrecht</li>
        </ul>
    </aside>
</main>

<?php include "layouts/footer.php"; ?>
</body>
</html>
