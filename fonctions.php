<?php
include 'includes/menu.php';
 include 'includes/header.php'; 
//global $allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2']; //2 ieme étape, déclaration avant de remplir la fonction
// global permet de rendre le tableau visible dans la fonctions


/*** FONCTIONS - unité logique pour réaliser certaines tâches***/
// créer une fonction pour <p>
//déclaration
function echop($str) {
    echo '<p>'.$str.'</p>';
}

function echot($str, $tag) {
    // fonction qui affiche la chaîne en entrée (argument1)
    //comprise entre début et fin d'une balise html fournie en entrée (ergument2)
   // 3ime étape, vérifie que le tag et la balise fait parties des tags autorisés, parcourir le tableau et faire la comparaison
    //$allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2'];

   // $found_tag = false; // par défaut, on considère que la balise n'a pas été trouvé// le flag
    //foreach ($allowed_tags as $allowed) {
          //  if ($tag == $allowed) {
                //$found_tag = true; // tag trouvé dans le tableau
           // }
    //}

//if ($found_tag) {
    

// on peut aussi faire transiter par un variable intermédiaire  (found tag = isTagAllowed($tag) if found_tag)
    if (isTagAllowed($tag)) {  // une fonction qui en appèle une autre
     echo '<'.$tag.'>'.$str.'</'.$tag.'>';
} else {
    echop ('La balise' .$tag. 'inconnue ou non permise'); //fonction qu'on a crée avant pour l'affichage pour éviter de taper <p></p>
}  
}






function isTagAllowed($tag) { //Is renvoie la valeur booléenne
    $allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2'];
     $found_tag = false; // par défaut, on considère que la balise n'a pas été trouvé// le flag
    foreach ($allowed_tags as $allowed) {
           if ($tag == $allowed) {
                $found_tag = true; // tag trouvé dans le tableau
            }
    }
    return $found_tag; // on retourne vrai ou faux
}







// invocation (appel)
$allowed_tags = ['p', 'div', 'span', 'strong', 'em', 'h1', 'h2']; //2 ieme étape, déclaration avant de remplir la fonction
echo 'Les fonctions sont utiles';
echo 'Les fonctions sont utiles';
echo 'Les fonctions sont utiles';




echop("Les fonctions sont utiles");
echop("Les fonctions sont utiles");
echop("Les fonctions sont utiles");

echot("Les fonctions sont utiles", "div");
echot("Les fonctions sont utiles", "p");
echot("Les fonctions sont utiles", "span");
echot("Les fonctions sont utiles", "blabla");

if (isTagAllowed('hdiv')) {
    echop ('Ce tag est autorisé');
}

include 'includes/footer.php';
?>