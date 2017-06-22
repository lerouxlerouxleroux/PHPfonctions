<?php
include 'classes/PlayerManager.class.php';
include_once 'classes/Players.class.php';

    // point d'entrée (entry point) des requêtes ajax 
//envoyées par le client


$req_methode = $_SERVER['REQUEST_METHOD']; // renvoie le nom de la methode
//HTTP utilisée par la requete du client
//echo $req_methode;

if ($req_methode == 'GET') {

    switch ($_GET['action']) {
    
     case 'list':
        $pm = new PlayerManager();
        echo json_encode($pm->getListFromAjax());
        break;
   
     case 'delete':
        $pm = new PlayerManager();

        if ($pm->getById($_GET['id'])->delete()) {
            echo 'Joueur supprimé';
        } else {
            echo 'La tentative de suppression a échoué';
        }
        break;
    
     default:
      echo "Action non reconnue";
        break;
}

} elseif ($req_methode == 'POST') {
    // PHP ne met pas les données postées par le client dans $_POST
    // lorsque la requete $_POST est effectué en ajax
    //echo 'requete POST';
    // file_get_contents('php://input')renvoie les données postées par le client en requete ajax
    

    // par défaut json_decode convertit la chaine json en objet,
    // le parametre$assoc = true permet d'obtenir à la place un tableau associatif
    $data = json_decode(file_get_contents('php://input'), $assoc = true);
    //echo $data->player->nom;
    //echo json_encode($data->player);
    $player = new Player($data['player']);// en tab associatif au lieu de 
    //$data->player (version objet)
    //$player->save(); //enregistrement dans bdd, save(envoie la valeur booléen,)
    if ($player->id) 
    {
        // l'id est précisé, on passe au mode mise à jour
        if($player->update()) {
            echo 'joueur mis à jour';
        } else {
            echo 'La mise à jour a échoué';
        }

    } else {

        if($player->save()) {
             echo 'joueur enregistré';
        } else {
            'L\'enregistrement a échoué';
        }
    }

} else  {  
    echo 'Methode HTTP non traitée';     
}

   
?>