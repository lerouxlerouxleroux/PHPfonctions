<?php
include '../includes/util.inc.php';
   
    //$str = "benfica-blablabla-coucou.jpg";
    // echo strlen($str); //renvoie 28
   // $len = strlen($str); //28
   // $sub = substr($str, $len-4);
    //echo $sub;
    //echo substr($str, 5, 3);
   // echo substr($str, -4);
    $name = 'Milan AC'; // retour attendu :milan-nc, test fonction newFormat
    echo rightFormat($name);
?>