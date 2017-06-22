<?php


// function connect () {
//   $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');
//   return $db;  
// }

 $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');


$query = $db->prepare('SELECT * FROM paysdumonde'); 

$query->execute();
$results = $query->fetchAll(); 
 var_dump($results);
echo json_encode($results);

?>