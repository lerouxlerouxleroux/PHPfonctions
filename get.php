<?php
include 'includes/util.inc.php';
   include 'includes/header.php';
   include 'includes/menu.php'; 
?>

<h1>GET</h1>

<?php

//echo $_GET ['param']; //la super global $_GET est un tableau associatif contenant les parametres fournis dans l'URL
echo '<p>Pays demandé: ' . $_GET['country'] .'</p>';
echo '<p>Sport demandé: ' . $_GET['sport'] .'</p>';


$country = $_GET['country']; // on assigne à la varible country la superglobal get
$sport = $_GET['sport'];

echop ('Pays demandé:' . $country);
echop ('Sport demandé:' . $sport);

switch (strtolower($country)) {
    case 'italie':
       echo "Siamo molto felici di imparare il PHP";
       include 'italie.php';
        break;  //équivalent de elseif

    case 'france':
       echo "Nous sommes très heureux d'apprendre le PHP";
        break;


    case 'roumanie':
       echo "Suntem foarte fericiti sa invantam PHP-ul";
        break;

    case 'espagne':
       echo "Estamos muy felices de apprender el PHP";
        break;


    default: // aund aucun des cas n'a été validé
       echo "Pays inconnu";
        break;
}

?>



 <?php include 'includes/footer.php'; ?>
     