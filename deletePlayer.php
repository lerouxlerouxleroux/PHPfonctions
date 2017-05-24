<?php
include 'includes/connexion_db.php'; // fourni la fonction connect ();

// récupération de l'id du joueur
if (isset($_GET['id'])) {
    $id = $_GET['id']; //range get dans un variable

// étape 1 connexion
    $db = connect (); //programmation orientée objet

// étape 2 requête
   $query = $db -> prepare('DELETE FROM joueur WHERE id = :id'); //variable $query recoit le résultat de $db? ** tos les colonne SELECT, donc requete en lecture, donc fetch

// etape 3 exécution
   $query->execute(array(
        ':id' => $id
    ));

 // rédirection vers liste joueurs
   header('location:joueurs.php');
}



?>
<?php 
include 'includes/footer.php'; 
?>