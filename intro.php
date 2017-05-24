<?php

echo 'Bonjour';
echo '<p>Au revoir</p>';
echo '<ul><li>Pomme</li>';
echo '<li>Mangue</li></ul>';




$nb1 = 10;
if ($nb1 > 10) {
     if ($nb1 > 10000) {
        echo "<div>IMMENSE</div>";
     } else {
        echo "Il n'est vrai que " . $nb1 . " est supérieur à 10";
    }
}
elseif ($nb1 == 10) {
    
    echo "Il n'est pas vrai que " . $nb1 . " est égal à 10";
}

 else {

   echo "Il n'est pas vrai que " . $nb1 . " est supérieur à 10";
}
// ajouter la condition si nb1 est supérieur ^10000 affiche "immense"

$connected = true;

if ($connected) echo "Vous etes connecté";
if ($connected === false) echo "Vous n'etes pas connecté";
// une autre manière d'écrire, ! est un opérateur d'inversement, signifie "is not", fonctionne uniquement avec les booléens
if (!$connected) echo "Vous n'etes pas connecté";  // égale à if ($connected === false) echo "Vous n'etes pas connecté";

if (!$nb1 == 10) {
    // si $nb n'est pas égal (donc différent) à 10
    // autre syntaxe possible $nb != 10
}

?>


