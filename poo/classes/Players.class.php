<?php
class Player 

{   
    public $db;

    public $id; // besoin d'id pour les opérations de suppression et de mise à jour
    public $nom;
    public $prenom;
    public $age;
    public $num_maillot;
    public $equipe;

    function __construct($data) // hydratation, on injècte de la matière dans cette substance qui est la classe
    
    {
         //1) connexion à la base de données
        $this->db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');

        
        // si l'identifiant du joueur fait parti du tableau de 
        //données passé en entrée du constructeur , 
        //on l'utilise pour hydrater la propriete id de l'objet
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }


        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->age = $data['age'];
        $this->num_maillot = $data['num_maillot'];
        $this->equipe = $data['equipe'];


    }

    function save() //envoie les donnéees dans la bdd

    {

        //2) requete
    $query = $this->db->prepare
    ('INSERT INTO joueur (nom, prenom, age, num_maillot, equipe) 
        VALUES (:nom, :prenom, :age, :num_maillot, :equipe)');   


    //3) execution
    return $query->execute(array(
    ':nom'               => $this->nom,
    ':prenom'            => $this->prenom,
    ':age'               => $this->age,
    ':num_maillot'       => $this->num_maillot,
    ':equipe'            => $this->equipe
    
    )); 

    }

    function update() 

    {

        $query = $this->db->prepare
            ('
            UPDATE joueur SET prenom = :prenom, nom = :nom, age = :age, num_maillot = :num_maillot, equipe = :equipe 
            WHERE id=:id
            '); 

        $query->execute(array(
        ':prenom' =>        $this->prenom,
        ':nom' =>           $this->nom,
        ':age' =>           $this->age,
        ':num_maillot' =>   $this->num_maillot,
        ':equipe' =>        $this->equipe,
        ':id' =>            $this->id  //voir absolument ligne 82 pour ID hidden
    ));

    }
 

 function delete() 

 {

     $query = $this->db -> prepare('DELETE FROM joueur WHERE id = :id');  

 
  return $query->execute(array(
        ':id' => $this->id
    ));

 }

}



?>