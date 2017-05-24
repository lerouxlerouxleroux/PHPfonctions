<?php
// 1) connexion
function connect () {
  $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');
  return $db;  
}


?>