<?php
include 'includes/util.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 
?>

<h1>POST</h1>

<?php

print_r($_POST);

$email = $_POST['email'];
$pass = $_POST['pass'];


if (isset($_POST['admin'])) {
$admin = $_POST['admin'];  
}// vérifier l'existence du admin
 //$admin = $_POST['admin']; si on ne coche pas admin donne message d'erreur


/*$test = null; // comprendre la fonction isset // utiliser test quand il y a une doute sur l'existence d'un variable
// une variable qui a la valeur NULL n'est pas définie


if (isset($test)) 
{
    echop ("La variable $test est définie");
} else {
    echop ("La variable $test n'est pas définie");
}*/


if ($email == "test@test.fr" && $pass == 1234 && isset($admin)) {

    echop("Identification réussie...");
    }
else {
    echop("L'identification a échoué...");

}

?>


 <?php include 'includes/footer.php'; ?>
