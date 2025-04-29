<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Cecilia Anim"

    <title></title>

    <link rel="stylesheet" href="/public/css/stylesheet.css">
    <script src="/public/admin.js" defer></script>  <!-- defer betekent: voer dit script uit nadat de HTML is geladen.-->

</head>
<body class="presentation">

<!--- Start header --->

<header class="nav" >

    <a class="active" href="/"> Home&#128171</a>




</header>

<!--- Start Main --->
<main>
    <aside class="SidebarLeft">
        <div style="text-align: center">
            <img class="profilephoto" src="./public/photo/thumbnail_IMG_1194.jpg" height="200" width="200" border="3" alt="picture of a woman"/>
            <br><br>
            <ul style="list-style-type:none;">
                <li>Naam: Cecilia Anim</li>
                <li>Leeftijd: 31 jaar</li>
                <li>Woonplaats: Amsterdam</li>
                <li>Beroep: Junior Software Developer</li>
            </ul>
        </div>
    </aside>


    <aside class="SidebarRight">
        <p>Landen/Steden waar ik in de toekomst wil werken:</p>
        <ul>
            <li>Amsterdam&#128204;</li>
            <li>Portugal</li>
            <li>Haarlem&#128204;</li>
            <li>Vancouver</li>
            <li>Thailand&#128204;</li>
            <li>Almere</li>
            <li>Mexico</li>
        </ul>
        <br><hr><br>
        <p>Programmeertalen waar ik ervaring mee hebt&#128337;:</p>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>PHP</li>


        </ul>
    </aside>
</main>

<?php
include 'view/footer.php';
?>