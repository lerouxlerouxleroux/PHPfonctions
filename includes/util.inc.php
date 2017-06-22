
<?php
// fichier à inclure

function echop($str) {
    echo '<p>'.$str.'</p>';
}



function isFormatAllowed($format) {  //$format définit qu'en moment de l'appel de la fonction,  comme placeholder
   //formats de fichier autorisés
    $isAllowed = false; // par défaut false, variable qu'on retournera
   
    $formats_allowed = ['.png', '.jpg', '.gif'];

    foreach ($formats_allowed as $format_allowed) {
            if ($format_allowed == $format) {
                $isAllowed = true;
            }

    }

    return $isAllowed;
}
 


?>

 