<?php

include 'includes/connexion_db.php';

$db = connect();

    //2) requete
$query = $db->prepare('
            INSERT INTO joueur (nom, prenom, age, num_maillot, equipe) 
            VALUES (:nom, :prenom, :age, :num_maillot, :equipe)
'); 

$result = $query->execute(array(
    ':nom' => $_POST['nom'],
    ':prenom' => $_POST['prenom'],
    ':age'=> $_POST['age'],  
    ':num_maillot'=> $_POST['maillot'],
    ':equipe'=> $_POST['equipe']
    ));  


echo $result; // envoie le résultat de la requete sql s(booléen) au client



?>