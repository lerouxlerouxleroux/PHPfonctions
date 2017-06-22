<?php
class Maths 
{
    public $nb1;
    public $nb2;
    

function __construct($v1, $v2) // définis la premiere fois
{

    $this->nb1 = $v1; //l'objet instancie
    $this->nb2 = $v2;
}

function add() // ces methodes ne demmandent pas d'argument, les proprietes sont founis plus haut en instantiation

{ 
   return $this->nb1 + $this->nb2; 


}

function multiply() 

{

    return $this->nb1 * $this->nb2; 

}
function substract($v1, $v2) //case, placeholders vides qui seront replis au moment de calcul

{ 
    //return $this->nb1 - $this->nb2;
   

    //retourne le résultat de la soustraction
    //entre deux valeurs fournies lors de l'appel
    //de la methode
    // A la différence de deux methodes add et multiply
    // nous n'opérons pas ici sur les propriétés internes
    //de la classe (objets issues de cette classe)
    return $v1 - $v2; //fournir en appel les arguments dans la fonctions

}

}

?>