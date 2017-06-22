<?php
    session_start();

//détruit session et redirige vers l'accueil
    session_destroy();
    header('location:index.php');
?>