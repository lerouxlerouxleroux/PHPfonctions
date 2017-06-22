<?php 
include 'classes/Maths.class.php';

function add($nb1, $nb2) {
    return $nb1 + $nb2;
}

function multiply($nb1, $nb2) {

    return $nb1 * $nb2;

}

echo add (4, 12) . '<br>' . multiply(5, 3);

//*** exercice***
//créer une class Maths avec les caractéristiques suivantes:
//-constructeur recevant deux paramètres (valeurs numériques)
// propriété: nb1, nb2
//methodes : add et multiply
// les methodes renverront l'addition ou le produit des deux propriétés de cette class

$math = new Maths(12, 2);

echo $math->add() . '<br>' . $math->multiply(); // on passe la fonction add
echo $math->substract(90,60) . ' ' . $math->substract(8,20) . '<br>';


?>