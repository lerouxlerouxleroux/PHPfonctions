<?php
include '../../includes/connexion_db.php';
$id = $_GET['id'];
$db = connect();
$query = $db->prepare('SELECT * FROM pays WHERE id = :id');
$query->execute(array(
     ':id' => $id
 ));
 $pays = $query->fetch();
echo json_encode($pays);

?>