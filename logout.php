<?php
session_start();
session_unset(); //verwijdert alle sessievariabelen
session_destroy();// Vernietigt de sessie
header("location:home.views.php");
exit;
?>