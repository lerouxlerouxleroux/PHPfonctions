<?php
include 'includes/util.inc.php'; //bibliothèque d'outils
include 'includes/header.php';
include 'includes/menu.php'; 

if (isset($_GET['ageLimit'])) {
    $ageLimit = $_GET['ageLimit'];
  if (strlen($ageLimit) > 2) {  // protection contre injection sql, si l'utilisateur donne une valeur contenant plus de 2 caractère on force age limite à recevoir la veleur de 35
        $ageLimit = 35; //protection contre injection sql
  }
         
}

// connexion à la base de données

// bibliothèque utilisé pour dialoguer avec MySql : PDO
$db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');  //l'argument; nom d'utilisateur , copie de PDO, objet est résultant d'une copie, créee un appel ' la'objet, quand on utilise une fonction à partir d'un objet on parle d'une méthode, plus bas prepare


//préparation de la requête (lecture), $query pour récupérer le retour
if (isset($ageLimit)) {
  $query = $db->prepare('SELECT * FROM joueur WHERE age < ' . $ageLimit);  //form et where sont des clauses sql  
} else {
    $query = $db->prepare('SELECT * FROM joueur'); 
}


//la réponse est stocké dans une variale
//exécution
 
//$joueurs = $query->execute();
$query->execute(); // execute renvoie une valeur booléenne




//récupération des données (fecth-que la première ligne)
//$joueurs = $query->fetchAll();

//var_dump($data);




?>

<h1>Joueurs</h1>


<div>
 <form>
   <label>Limite d'âge</label>
     <select name="ageLimit"> 
        <option value="20">20 ans</option>
        <option value="25">25 ans</option>
        <option value="30">30 ans</option>
        <option value="35">35 ans</option>
     </select>
   <input type="submit" value="Valider"> <!--tout input portant name sera transmit dans le superglobal (url) -->
</form>  <!--toujours mettre la balise form pour qque la requete du formulaires soit envoyé, à coté de "valider"-->

</div>

<?php
  /*  foreach ($joueurs as $joueur) {
      echo '<p>' .  $joueur['prenom']  . '' .  $joueur['nom']  . '</p>';

    } */


   // la methode fetch renvoie sous forme d'un tableau php la première ligne sql non traitées
   // les lignes sql déja traitées (fetched) ne sont plus dnas l'objet query, fetch renvoie false quand toutes les lignes sql ont été traitées 
    // AUTRE manière de FAIRE LA BOUCLE
    //$condition = 
     // $joueur[''] > 0 &&
     // $joueur[''] < 1000;
   // if ($condition) { echo}...

    while ($joueur = $query->fetch()) { 
        // à chaque itération la variable $joueur reçoit le résultat de fetch(), c.t.d. un tableau associatif contenant les données du joueur
      $condition = 
         $joueur['num_maillot'] > 0 &&
         $joueur['num_maillot'] < 1000;
     
      if ($condition) {
        echo '<p>' .  $joueur['prenom']  . ' ' .  $joueur['nom']  . ' (' . $joueur['num_maillot'] .  ')';
      }
        else {
          echo '<p>' . $joueur['prenom'] . '' . $joueur['nom'] . '';
        }

        echo ' <a class="btn btn-primary btn-xs" href = "updatePlayer.php?id=' .$joueur['id']. '">Modifier</a>';

        echo ' | ';
        
        echo ' <a class="btn btn-danger btn-xs"
         href = "deletePlayer.php?id=' .$joueur['id']. '">Supprimer</a>';

        echo '</p>';
    }


?>


<?php include 'includes/footer.php'; ?>