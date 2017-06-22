<?php
include_once 'Players.class.php';

class PlayerManager {

    public $db;

    function __construct()
    {
            $this->db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', ''); // etape 1 connexion

    
    }

    






    function getList() 

    { 
         $query = $this->db->prepare('SELECT * FROM joueur'); // etape 2, réagencer la liste
         $query->execute();
         return $query; // renvoie le retour SQL sans fetchdonnée en format mysql ou avec ->fetchAll le tableau associatif PHP


    }

    



    function getListFilteredByAge($ageLimit) 

    {
             $query = $this->db->prepare('SELECT * FROM joueur WHERE age < ' . $ageLimit);
             $query->execute();
             return $query; //

    }



     function getListFetched() 

    { 
         $query = $this->db->prepare('SELECT * FROM joueur'); // etape 2, réagencer la liste
         $query->execute();
         return $query->fetchAll(); // renvoie  un tableau associatif


    }
    function getListFromAjax() 
    
    {
        $query = $this->db->prepare('
         SELECT 
         joueur.id, 
         joueur.nom, 
         joueur.prenom, 
         joueur.age, joueur.equipe, 
         joueur.num_maillot, 
         equipe.logo AS equipe_logo, 
         equipe.nom AS equipe_nom
        FROM joueur
        LEFT JOIN equipe 
        ON joueur.equipe = equipe.id
        ORDER BY  joueur.nom ASC, joueur.age ASC
        '); 

       $query->execute();
       $results = $query->fetchAll(); 
       for ($i=0; $i < sizeof($results); $i++) {
       $results[$i]['nom'] = strtoupper($results[$i]['nom']); 

   

//si le joueur n'est relié à aucune équipe, on modifie sa propriété "equipe_logo" en lui assignant le lien ver le logo pole emploie
    if ($results[$i]['equipe']==0) // si joueur est sans éuqipe
    {
        $results[$i]['equipe_nom'] = "Sans equipe";
        $results[$i]['equipe_logo'] = "img/joueurs/pole-emploi.jpg";
    }
}
return $results;

    }



    function getById($id)
    {
            $query = $this->db->prepare('
                SELECT * FROM joueur WHERE id = :id');
            $query->execute(array(
                ':id' => $id
        ));
            //return $query->fetch(); // renvoie le tableau associatif

            $player = new Player($query->fetch()); //retourne un objet de type joueur
            return $player;

    }

}


?>