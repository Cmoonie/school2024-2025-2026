<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CinkedIN</title>
    <link rel="stylesheet" href="/public/css/stylessheet.css">

</head>
<body>

<!--- Start header --->

<header class="topnav" >

    <a class="active" href="/"> Home</a>

</header>


<main>
    <form>


        <label for="email">E-mail:</label><br>
        <input type="text" id="email" E-mail="email"><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="text" id="wachtwoord" Wachtwoord="wachtwoord"><br>

            <button type="submit" >Aanmelden
        </button>
    </form>
</main>

    <?php

include "layouts/footer.php";
?>