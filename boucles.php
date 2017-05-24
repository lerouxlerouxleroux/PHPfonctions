<?php
include 'includes/menu.php';
include 'includes/header.php';
    
    //*** boucles ***
// FOR

for ($i=0; $i<10; $i++) {
    echo "<p>" . $i. "</p>";

}

// WHILE
//i = 0; // initialisation endehors de la boucle, variable servant d'incrémenteur
//while ($i < 10) {
 //   echo "<p>" . $i. "</p>";
  //  $i++;
//}


// FOREACH
// boucle idéal pour parcourir un tableau

$mois = ["janvier", "février", "mars", "avril"];

echo "<select>";
foreach ($mois as $m) { //la variable $m est automatiquement assignée à chaque itération, 
// elle correspondera tout à tour à chaque valeur contenu dans le tableau $mois 
    echo "<option>" . $m . "</option>";
}
for ($i=0; $i<4; $i++) {
   echo "<option>" . $mois[$i] . "</option>"; 
}
   echo "</select>";

$animaux = ["casoar", "elephant", "loup", "ourson", "renard"];
$width = 300;
//$i = 1; // plus loin \"width:". $width*1 . "px\"
foreach ($animaux as $animal) {
    echo "<div><img style=\"width:". $width . "px; border:2px orange solid\" src=\"img/" . $animal . ".jpg\"></div>"; // \" échappement de caractères, pour éviter le conflits des guillemets
    $i++;
}

echo "<script src=\"js/script.js\"></script>"; // ou faire simples cotes extérieurs et les guillemets à l'intérieur
// comme echo '<script src="js/script.js"></script>'
// Exo. Afficher deux autres photos au choix. Afficher une bordure colorée autour des images
include 'includes/footer.php';
?>