
<?php

function echop($str) {
    echo '<p>'.$str.'</p>';
}

function rightFormat($str) {
    $newFormat = null; // ou nullcorrespondera à la chaine reformatée//2
    $newFormat = trim($str); // supression des expaces en début et fin de chaîne
    $newFormat =  strtolower($newFormat); // passage à la minuscule
   
    // remplacement de l'espace par un tiret, premier argument c'est le caractère recherche, puis le caractère de substitution, et enfin la chaine dans laquelle vous souhaiter faire cette transformation
    $newFormat = str_replace(' ', '-', $newFormat);
    
    return $newFormat; //1

}

?>
