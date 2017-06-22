<?php
function isLogged() {
    if (isset($_SESSION['user'])) // si ca c'est vrai l'utilisateur est loggué 
    {
        return true;
    }
    else {
        return false;
    }
}

function getRole($user) {
    return $_SESSION['user']['role'];
}
 

?>