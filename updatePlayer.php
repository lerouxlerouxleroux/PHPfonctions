<?php
include_once 'includes/connexion_db.php'; // fourni la fonction connect ();
include 'includes/equipe.inc.php';
include 'includes/util.inc.php'; //bibliothèque d'outils
include 'includes/header.php';
include 'includes/menu.php'; 

// récupération de l'id du joueur
if (isset($_GET['id'])) {
    $id = $_GET['id']; //range get dans un variable
// étape 1 connexion
    $db = connect (); //programmation orientée objet
// étape 2 requête
   $query = $db -> prepare('SELECT * FROM joueur WHERE id = :id'); //variable $query recoit le résultat de $db? ** tos les colonne SELECT, donc requete en lecture, donc fetch

// etape 3 exécution
   $query->execute(array(
        ':id' => $id
    ));

//4 étape fetch
   $joueur = $query -> fetch(); // un seul résultat attendu, donc 1 seul fetch sans boucle while

}

// mise à jour de la table joueur
if (isset($_POST['input'])) {
    // le bouton "Mettre à jour" a été cliqué

// si la connexion n'existe pas on DOIT l'initialiser avant l'étape de requête
if (!isset($db)) $db = connect(); 

$query = $db->prepare('UPDATE joueur SET prenom = :prenom, nom = :nom, age = :age, num_maillot = :num_maillot, equipe = :equipe 
WHERE id=:id'); //absolument id
$query->execute(array(
        ':prenom' =>        $_POST['prenom'],
        ':nom' =>           $_POST['nom'],
        ':age' =>           $_POST['age'],
        ':num_maillot' =>   $_POST['num_maillot'],
        ':equipe' =>        $_POST['equipe'],
        ':id' =>            $_POST['id']  //voir absolument ligne 82 pour ID hidden
    ));
// redirection vers la liste des joueurs, le serveur qui fait une autodemande
header('location:joueurs.php'); //la destination de la page "modifier"

}


?>

<!--ENVOIE AU CLIENT-->

<form method="post"> 

    <label>Nom</label>
    
    <input type="text" 
        name="nom" 
        value="<?php echo $joueur['nom'] ?>">

    
    <label>Prenom</label>
    <input 
        type="text" 
        name="prenom"
        value="<?php echo $joueur['prenom'] ?>">

    
    <label>Age</label>
    <input 
        type="text" 
        name="age"
        value="<?php echo $joueur['age'] ?>">

    <label>Numero de maillot</label>


    <!--<input type="text" name="num_maillot">-->
    

    <select name="num_maillot"> <!--name qui sera récupéré dans POST ligne 37-->
        <?php
            for ($i=1; $i<1000; $i++) {
                 if ($i == $joueur['num_maillot']) {
                 echo '<option selected value="'.$i.'">'.$i.'</option>'; // ou <option value=".$i+1." , concéténation entre guillemets
          }else{
            echo '<option value="'.$i.'">'.$i.'</option>'; 
          }
            }
        ?>
    </select>

    <label>Equipe</label>
    <?php echo selectFormatWithOpt(getTeams(), $joueur['equipe']); ?>


    <input type="hidden" name ="id" value ="<?php echo $id ?>" />  <!--conserver la mémoire d'id, permet de mettre à jour les infos plus tard
   -->
    <input type="submit" name="input" value="Mettre à jour">

</form>

<?php 
include 'includes/footer.php'; 
?>