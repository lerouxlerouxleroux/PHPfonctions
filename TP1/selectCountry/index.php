<?php
include '../../includes/connexion_db.php';


$db = connect(); // connection à la db
$query = $db->prepare('SELECT id, nom FROM pays ORDER BY nom ASC'); // requête SQL
$query->execute();
$pays = $query->fetchAll(); // crée et renvoie tableau associatif des données

?>

<!DOCTYPE html>
<html>
<head>
    <title>TP Select Country</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/pays.css">
</head>
<body>
 <h1>TP: Selection d'un pays </h1>
<select>
<option value="0">Choisir un pays</option>
    <? php
        foreach ($pays as $p) {
            echo '<option value="'.$p['id'].'">'.$p['nom'].'</option>';
        }  

    ?>
</select>
<div class="container" id="pays_infos">
    <div class="row">
     <div class="col-md-6">
     <p><strong>Capitale</strong>
     <span></span></p>
     <p><strong>Nombre d'habitants</strong>
     <span></span></p>
     <p><strong>Superficie</strong>
     <span></span></p>
     <p><strong>Langues officielles</strong>
     <span></span></p>
         
     </div>
      <div class="col-md-6">
      <img class="flag" src="img/drapeaux/italie.png">
          
      </div>
    </div>
</div>


<script src="js/zepto.min.js"></script>
<script src="js/pays.js"></script>
</body>
</html>