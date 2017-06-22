<?php

include 'includes/util.inc.php'; //bibliothèque d'outils
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 


// note concernant upload
//pour prendre en compte des fichiers > 2M
// Modifier le fichier php.ini: c:\wamp64\bin\php\<php_version>
//upload_max_filesize = 2M

// EXO FORMATS AUTORISEs

if (isset($_POST['input']) && isset($_FILES)) //si formulaire est posté et que le client ait parcouru et choisi le fichier
   
{ 
         $extension = substr($_FILES['logo']['name'], -4);//fonction , range photo sur le serveur avec le nom de l'équipe, exemple 77.jpg    
         $conditions = 
         $_FILES['logo']['size'] < 500000 &&
         isFormatAllowed($extension);  //expression booléenne
    

     // upload du fichier
  if ($conditions)
   
   {
 

    //déplacer le fichier de la zone temporaire vers son emplacement "difinitif" sur le serveurlieu de logo.jpg, ce qui est différente de ranger juste le logo sur le serveur avec le nom initial
    $src = $_FILES['logo']['tmp_name'];
    //$dest = 'img/' . $_FILES['logo']['name'];
    $dest = 'img/' . rightFormat($_POST['nom']) . $extention;
    move_uploaded_file($src, $dest);// cle tmp_name dans var_dump
    $team = $_POST; // copie de $_POST dans $team;
    $team['logo'] = $dest;// on ajoute la clé logo au tableau associatif $team

 if (createTeam($team)) { // l'enregistremenet dans DBB ne se fera que si le fichier est correct
    // redirection
 
    header ('location:joueurs.php');
   
   } else {
        echo '<p class="text-warning">L\'enregistrement a échoué</p>';
   }
 } else {
    echo '<p>Format non autorisé ou fichier trop lourd</p>';
 }

 }





 ?>

 <?php

//if (isset($_SESSION['logged'])) {
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] == 'admin') {
            include 'includes/forms/addTeam.inc.php'; //on envoie à l'utilisateur le formulaire
    } else {
        echop ('Droits insuffisants');
    }
    }


 else  
    {
    
     echop('Vous devez être connecté pour acceder à cette ressource');
    }

 ?>        

 <?php
 include 'includes/footer.php';
 ?>