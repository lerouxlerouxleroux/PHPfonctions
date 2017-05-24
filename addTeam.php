<?php
include 'includes/util.inc.php'; //bibliothèque d'outils
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 

if (isset($_POST['input'])) //si formulaire est posté
    {   

    
    //var_dump($team);
   
    //var_dump($_POST);
   


     // upload du fichier
 if ($_FILES['logo']['size'] < 500000) {
 

    //déplacer le fichier de la zone temporaire vers son emplacement "difinitif" sur le serveur
    $extention = substr($_FILES['logo']['name'], -4);//fonction , range photo sur le serveur avec le nom de l'équipe, exemple 77.jpg au lieu de logo.jpg, ce qui est différente de ranger juste le logo sur le serveur avec le nom initial
    $src = $_FILES['logo']['tmp_name'];
    //$dest = 'img/' . $_FILES['logo']['name'];
    $dest = 'img/' . $_POST['nom'] . $extention;
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
    echo '<p>Fichier trop lourd</p>';
 }

 }





 ?>


<h1>Enregistrer une équipe</h1>
<div class="container">
<!--enctype="multipart/form-data"> permet d'envoyer des fichiers-->
    <form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
        <label>Equipe</label>
        <input type="text" name="nom">
       </div>
    <div class="col-md-4">     
        <label>Entraîneur</label>
        <input type="text" name="entraineur">
    </div>
        
    <div class="col-md-4">
        <label>Couleurs</label>
        <input type="text" name="couleurs">
    </div>
</div> 

<div class="col-md-4">
        <label>Logo</label>
        <input type="file" name="logo">
    </div>

<div class="row">
    <div class="col-md-12">
        <input type="submit" name="input" value="Enregistrer">
    </div>
</div>
</form>
</div>
        

 <?php
 include 'includes/footer.php';
 ?>