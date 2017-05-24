<?php
include 'includes/menu.php';
 include 'includes/header.php'; 

// Variables (déclaration)

//***Types simples
$message = 'Le PHP est formidable'; //string
 
//une assignation
 
// en php on ne déclare pas un type des variables par opposition à d'autres langages
echo $message;
$nb1 = -5.0;  // type number
$nb2 = 2.21; // type number
$resultat = $nb1*$nb2;
$actif = true;

$utilisateur = null; // null, permet d'indiquer explicitement que tel variable n'a pas encore reçu de valeur, valeur temporaire, "en attendant de"

//Concaténation
echo '<p>Résultat: '.$resultat. '</p>';
// . une concaténation etl'intégration des balises htmls
echo '<p>' . $nb1 . ' * ' . $nb2 . ' = <strong>' . $resultat . '</strong></p>';

//structures conditionnelles
// if 

//*** Types comlexes ***/
// tableau
// tableau à indice numérique (premier élément indexé à 0)
$nombres = [4, 7, 569, 12];
$joueurs = ["Bonucci", "Barzagli", "Chiellini"];
$mix = ["Buffon", 1 , true];
 echo $nombres[3]; //renvoie 12
 echo $joueurs[0]; // renvoie Bonucci
 $mix[2] = false; // mofifier la valeur: écrase (écrit) la valeur précédente située à l'indice 2 du tablea, true du £mix est remplacé par false
 

// TABLEAU ASSOCIATIF, association cle nom, valeur bonnouci, clé prenom valeur leonardo, clé, fleche, valeur, on va associer les photos à ce joueur

$bonucci1 = [
    'path' => 'img/joueurs/bonucci1.jpg', 
    'caption' => 'Bonucci célébrant un but', 
    'alt' => 'Célébration'
];

$bonucci2 = [
    'path' => 'img/joueurs/bonucci2.jpg', 
    'caption' => 'Bonucci rageur', 
    'alt' => 'Rage'
];

$bonucci3 = [
    'path' => 'img/joueurs/bonucci3.jpg', 
    'caption' => 'Bonucci en conférence de presse', 
    'alt' => 'Conférence'
];



 $joueur  = [
    'nom' => 'Bonnuci', 
    'prenom' => 'Leonardo',
    'age' => 29,
    'numero' => 19,
    'club' => 'Juventus',
    'international' => true,
    'photos' => ['bonucci1', 'bonucci2', 'bonucci3'], // structure itérable
    'photos2' => [$bonucci1, $bonucci2, $bonucci3]  // imbrication des tableau dans le tableau
];

echo '<p>' . $joueur['club'] . '</p>'; // renvoie Juventus


/*foreach ($joueur['photos'] as $photo) {
    echo '<div><img src="img/joueurs/' .$photo.'.jpg"></div>';
}*/

//if ($joueur ['international']) {}

// On va associer les photos à ce joueur
echo '<table class="table table-triped">';




 // ON ENVOIE LE TABLEAU AU CLIENT!!! IMPORTANT!!!
foreach ($joueur['photos2'] as $photo) {
        echo '<tr>';
            echo '<td><img style="width:200px" src="'.$photo['path'].'"></td>';
            echo '<td>'.$photo['caption'].'</td>';
        echo '</tr>';
    }


echo '</table>';
include 'includes/footer.php';
?>