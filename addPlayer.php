<?php
include 'includes/util.inc.php';
include 'includes/equipe.inc.php';
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

?>

<h1>Enregistrer un joueur</h1>
<div class="container">
    <form method="POST">
    <div class="row">
        <div class="col-md-4">
        <label>Nom</label>
        <input type="text" name="nom">
       </div>
    <div class="col-md-4">     
        <label>Prenom</label>
        <input type="text" name="prenom">
    </div>
        
    <div class="col-md-4">
        <label>Age</label>
        <input type="text" name="age">
    </div>
</div> 
<div class="row">
    <div class="col-md-6">
        <label>Numero de maillot</label>
        <!--<input type="text" name="num_maillot">-->
        <select name="num_maillot">
            <?php
                for ($i=1; $i<1000; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';  // ou <option value=".$i+1." , concéténation entre guillemets
              
                }
            ?>
             </select>

    </div> <!--colonne-->
    <div class="col-md-6">
        <label>Equipe</label>
        <?php echo selectFormat(getTeams()); ?>
        <select>
            <option>blabla</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <input type="submit" name="input" value="Enregistrer">
    </div>
</div>
</form>
</div>
        

       

        
       
        
        
       

       



<?php include 'includes/footer.php'; ?>