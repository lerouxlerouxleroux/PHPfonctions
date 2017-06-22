<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
include_once 'includes/access.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 

if (isset($_POST['input'])) {
   // echo 'Le client a validé le formulaire';
   // 1 )connexion
    $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');
    //2) requete
    $query = $db->prepare
        ('INSERT INTO joueur (nom, prenom, age, num_maillot, equipe) VALUES (:nom, :prenom, :age, :num_maillot, :equipe)');  //zones vide en attente de valeur, les placeholders
// 3)exécution

$query->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'age'=> $_POST['age'], // pas besoin de fetch car on n'a pas demande au serveur de nous renvoyer les resultats, ici on ajoute le joueur au tableau en php myadmin
    'num_maillot'=> $_POST['num_maillot'],
    'equipe'=> $_POST['equipe']
    ));
//redirection
header('location:joueurs.php');

} else {
   // echo 'Le client n\'a pas validé le formulaire';
}

// chargement des équipes

if (isLogged()) {
    if (getRole() == 'admin' || 'client') {
    include 'includes/forms/addPlayer.inc.php';
    } else {
        echop ('Droits insuffisants');
    }
    
    }


 else  
   
    {
     
     echop('Vous devez être connecté pour acceder à cette ressource');
    
    }

?>

 
        

       

       
        
        
       

       



<?php include 'includes/footer.php'; ?>