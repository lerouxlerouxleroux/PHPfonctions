<? php
  //  echo 'ok';
include '../../includes/connexion_db.php';
$id = $_GET['id']; // récuperation de l'identifiant fourni en parametre d'url
//echo $id

$db = connect();// connexion à la db

$db->exec("set names utf8"); //résoult le problème d'encodage en UTF8(prélude nécéssaire à l'encodage json)


$query = $db->prepare('SELECT * FROM pays WHERE id = :id');// requete sql

$query->execute(array(
   
    ':id' => $id

));


$pays = $query->fetch(); //crée et renvoie tableau associatif des données //$pays définis pour la premiere fois

//var_dump($pays); utf8 ne résoud pas le problème
echo json_encode($pays);


?>
