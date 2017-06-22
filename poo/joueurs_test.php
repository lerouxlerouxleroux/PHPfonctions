<?php 
include_once 'classes/PlayerManager.class.php';
include_once 'classes/Players.class.php';

$pm = new PlayerManager();
$joueurs = $pm->getListFetched(); // va contenir les résultats
//var_dump($joueurs);
$donnees = [ // on va envelopper ces donner dans les objets // bloc enregistrant les donnéees dans la bdd
    'nom' => 'Nedved',
    'prenom' => 'Pavel',
    'age' => 45,
    'num_maillot' => 6,
    'equipe' => 1

];

$player = new Player($donnees); //on crée un nouveau joueur apres $donnees, 
//var_dump($player);
/*if ($player->save()) { // fait l'enregistrement en bdd
    echo 'Joueur enregistré en base de données';

} else {
    echo 'Echoué';

}*/


$player2 = $pm->getById(4); // recoit le resultat de la requete, c'est un objet player dotés de toutes les methode de la classe player
//var_dump($player2);
$player2->num_maillot = 26; // modification de donnéees
//var_dump($player2);
//$player2->update();

//$player3 = $pm->getById(28); //$pm contient les methodes de la clas np
//$player3->delete();
/*if ($pm->getById(4)->delete()) {
    echo 'joueur supprimé';

} else {
    echo 'echoué';
}*/



?>