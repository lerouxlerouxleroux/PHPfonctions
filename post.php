<?php
//session_start(); //ouverture ou reprise d'une session déja ouverte, permettant de conserver les infos coté serveur et donc parametres réintérogeables dans d'autres pages, 
include 'includes/util.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 

var_dump($_SESSION); //renvoie null si aucune session ouverte
// sinon renvoie le tableau associatif (potentiellement vide)
$_SESSION['test']='ça marche';
var_dump($_SESSION); 
?>

<h1>POST</h1>

<?php


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
    // Enregistrer cet état dans la session (mécanisme cré coté serveur qui va parmettre de dire "j'enregistre à partir de cet instant les infos qu'on ne souhaite pas mémoriser", mecanisme qui fait predurer certains info lors de l'ouverture de la session, redonne au dialogue de la mémoire)
    $_SESSION['logged'] = true; //2 étape après l'ouverture de la session session_start tout au début de la page, mecanisme contournant l'amnésie de http
    header('location:index.php');
    }
else {
    echop("L'identification a échoué...");

}

?>


 <?php include 'includes/footer.php'; ?>
