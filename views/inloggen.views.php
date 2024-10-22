<?php
include "layouts/header.php";

?>

<main class="INLOG">
    <div class="INLOG1">
    <form action="views/Profile.views.php">


        <label for="email">E-mail:</label><br>
        <input type="text" id="email" E-mail="email"><br>
        <label for="wachtwoord">Wachtwoord:</label><br>
        <input type="text" id="wachtwoord" Wachtwoord="wachtwoord"><br>


            <button type="submit">Aanmelden</button>
    </form>
    </div>
</main>

    <?php

include "layouts/footer.php";
?>