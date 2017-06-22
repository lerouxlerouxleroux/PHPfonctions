<?php 
include 'classes/Client.class.php';
include 'classes/Equipe.class.php';
include 'classes/Footballer.class.php';

class Joueur {

    public $nom = 'Zidane';
    public $prenom = 'Enzo';
    public $age;

    // méthode est une fonction à l'intérieur d'un classe
    public function identite() {
        echo strtoupper($this->nom) . ' ' .$this->prenom;
    }

}



$j1 = new Joueur(); // création des variables issus de la meme classe JOUEUR
$j2 = new Joueur();// chaqu'un des ces variables disposent les memes propriétés
$j3 = new joueur();

$equipe = array(); // [] tableau vide

for ($i=0; $i<11; $i++) { // boucle va trouner 11 fois, à chaque itération elle va créer un joueurqui va recevoir le résultat de l'opérateur NEW - opérateur d'instantiation, mécanisme qui permet de créer un objet à partir d'une class
    $joueur = new Joueur(); // class définit précédement
    
    //array_push($equipe, $joueur), version procédural; en JS : equipe.push(joueur)
    $equipe[$i] = $joueur;

} 
// équivalent en orienté procédural
function creerjoueur() { // la fonction modélise les données par tableau associatiof
    $joueur = [ // tableau associatiof
    'nom'=> 'Zidane', // association de clé et valeur
    'prenom'=> 'Enzo',
    'age'=> null

    ];

return $joueur;
} 

$j4 = creerjoueur(); // on créer le 4ieme joueur, le résultat de la fonction est rangé dans un nouvel variable
$j5 = creerjoueur(); //la fonction creer joueur envoie le tableau association pas un objet, en style procédural;

function identite($joueur) {
    echo strtoupper($joueur['nom']) . ' ' .$joueur['prenom'];
}
//fin orienté procédural


//utilisation de la classe Client
$client1 = new Client('Langlais', 'Sophie', '2132 1234 1234 2222');
echo $client1->nom;
echo $client1->prenom;
//echo $client1->nb_cb;


// on peut pas appeler une methode publique depuis l'extérieur de la classe
if ($client1->isCbValid()) {
    echo "Le numero de CB du client 1 est valide";

}

// test
/*
$cb = '2132 1234 1234';
$result = str_replace(' ', '', $cb);
echo $result;

function deleteSpaces($str) {
    return str_replace(' ', '', $str);
}

echo deleteSpaces("Php est un langage dérivé du C");*/


//utilisation de la classe Equipe
$psg = [ // donnée brut fournies au constructeur new Equipe
    'nom' => 'PSG',
    'annee_creation' => 1970,
    'entraineur' => 'Unai Emery', // valeur-clé
    'couleurs' => 'bleu, rouge'
];



$juve = [ // donnée brut fournies au constructeur new Equipe
    'nom' => 'Juventus',
    'annee_creation' => 1897,
    'entraineur' => 'Massimiliano Alegri', // valeur-clé
    'couleurs' => 'blanc, noir'
];

// deux instructions équivalents
$equipe1 = new Equipe($psg); // =>array
$equipe2 = new Equipe($juve);// => object

echo $psg['entraineur'];
echo $equipe1->entraineur;

//var_dump($psg);
//var_dump($equipe1);

$equipe1->joueContre('Benefica', 'Paris', '14/02/2005'); // on replit le tableau par push
$equipe1->joueContre('Porto', 'Paris', '15/02/2005');
$equipe1->joueContre('Madrid', 'Cardiff', '03/02/2005');

?>


<h1>POO en PHP</h1>


<?php
    
    echo '<p>'.$j1->nom .'</p>';
    echo '<p>'.$j1->prenom .'</p>';

    $j3->nom = 'Baggio'; //écriture 
    $j3->prenom = 'Roberto';
    $j3->age = 39; // pour donner un type numérique

    echo '<p>'.$j3->nom. ' ' . $j3->prenom. ' ('. $j3->age .' ans)</p>';

    $j3->identite(); // application de la methode idetite, ça part de l'objet et on décleche un comportements, appel en style objet

    echo '<p>'. $j4['nom'] .'</p>'; // affichage par tableau associatif
    echo '<p>'. $j5['prenom'] .'</p>';
    identite ($j5); // zppel a la fonction identite en style procédural

    //visibiltés des membres d'une classe en POO
    $alban = new Client ('CARROUE', 'Alban', '1234123412341234'); // objet de type client, cet objet de trois propriété public, c.t.d
    echo '<br>'. $alban->nom. ':' . $alban->getNbCb();//$alban->nb_cb; // pas une bonne pratique en Symfony, peut pas acceder en privé par ce code

    $alban->setNbCb("1234123412341234"); // la mise à jour non effectué car la valeur passé en etrée 
    //ne correspond pas aux critères de validation (longueur 16) imposées par la methode privée isCbOk utilisé en interne par 
    //le setteur setNbCb()

    $alban->setNbCb("1234123412341234"); // ici, la modification est autorisée
    // par la methode privée isCbOk();


    echo '<br>'. $alban->nom. ':' . $alban->getNbCb();
    

//test du principe d'héritage en POO
$data = [
    'nom'           => 'Verrati',
    'prenom'        => 'Marco',
    'age'           => '21',
    'num_maillot'   => 6,
    'equipe'        => 3
];


$f = new Footballer($data);
$f->setSalaire (1200);
echo '<br>' . $f->nom . ' gagne ' . $f->getSalaire() . 'euros par minute';
// l'héirtage ne fonctionne que dans un sens

?>