<?php

function connect () {
  $db = new PDO('mysql:host=localhost;dbname=formation-poec', 'root', '');
  return $db;  
}

if (isset($_POST['input'])) {
 

if (!isset($db)) $db = connect(); 

$query = $db->prepare('SELECT FROM paysdumonde   capital = :capital, nombre_habitants = :nombre_habitants, superficie = :superficie, langue = :langue, drapeau = :drapeau 
WHERE id=:id'); 
$query->execute(array(
        ':capital' =>        $_POST['capital'],
        ':nombre_habitants' => $_POST['nombre_habitants'],
        ':superficie' =>    $_POST['superficie'],
        ':langue' =>        $_POST['langue'],
        ':drapeau' =>        $_POST['drapeau'],
        ':id' =>            $_POST['id']  
    ));

header('location:index.php'); 


?>

<form method="post" id="input" name="input"> 

    <label>Capital</label>
    
    <input type="text" 
        name="capital" 
        value="<?php echo $paysdumonde['capital'] ?>">

    
    <label>Nombre d'habitants</label>
    <input 
        type="text" 
        name="nombre_habitants"
        value="<?php echo $paysdumonde['nombre_habitants'] ?>">

    
    <label>Superficie</label>
    <input 
        type="text" 
        name="superficie"
        value="<?php echo $paysdumonde['superficie'] ?>">

    <label>Langue parlée</label>
    <input 
        type="text" 
        name="langue">
     

    <label>Drapeau</label>
    <input 
        type="text" 
        name="drapeau">

