<?php
include 'includes/util.inc.php';
include 'includes/connexion_db.php';
include 'includes/header.php';
include 'includes/menu.php';
// sur ce fichier que index.php enverra les données
// on récupère ce qui est sur post
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['role'])) {//on vérifie bien que l'user a bien fourni email et son mot de passe (page index)

    $email = $_POST['email']; //superglobal fournit les infos
    $pass = $_POST['pass'];


// connexion à mysql, requête et exécution
    $db = connect ();
    $query = $db->prepare('
        SELECT * FROM users WHERE email = :email AND 
            password = :password 
        ');
    $query->execute (array(
        ':email'    => $email,
        ':password' => $pass

        ));


    $result = $query->fetch(); // fetch pour la lecture des données
    if ($result) { 
         
         $_SESSIONS['user'] = $result;
         header('redirection:index.php');
        
        // on logue l'utilisateur
    } else {

     echop ('Utilisateur non reconnu');

    }
    
    }
      else 

    {
        echop ('Formulaire non validé'); // acces par get
    }
    

 



 ?>

  <?php 
  include 'includes/footer.php'; 
  ?>