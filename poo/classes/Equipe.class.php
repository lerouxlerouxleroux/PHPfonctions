<?php
class Equipe 

{ 

  public $nom; // propriétés
  public $annee_creation;
  public $entraineur; // entraineur est un meme de la classe equipe                                                                                                                                                     
  public $couleurs;
  public $rencontres = []; //variable qui n'est pas hydraté et initialisé avec un tableau vide, zone de stockages

      //methodes
  function __construct($data) // tableau associatif de données qui vont alimenter l'objet, les membres de cet objet recoivent de la valeur
  { // on passe le tableau association que l'on parcourt

    //hydratation, faire corrspondre $data avec les propriétés
  $this->nom                 = $data['nom'];
  $this->annee_creation      = $data['annee_creation'];
  $this->entraineur          = $data['entraineur'];
  $this->couleurs            = $data['couleurs'];

  }

function joueContre($adversaire, $lieu, $date) // trois argument définis pour la première fois
{
   
    // ajoute au tableau des rencontres, un tableau associatif
    // contenant les infos de la rencontre
    array_push($this->rencontres, ["adversaire" => $adversaire, 
        "lieu" => $lieu, 
        "date" => $date

        ]);  // on range les données dans le tableau rencontres, tableau de niveau 2

}
    
}



?>