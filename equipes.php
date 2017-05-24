<?php

include 'includes/util.inc.php'; //bibliothèque d'outils
include 'includes/equipe.inc.php';
include 'includes/header.php';
include 'includes/menu.php'; 

 
 
?>

<h1>Equipes</h1>
<?php 
//echo getTeamsById(getTeams());
echo tableFormat(getTeams());
?>


<!--<form>
<div>
    <label>Nom</label>
    <input type=text name=nom>
</div>

<div>
    <label>Entraineur</label>
    <input type=text name=entraineur>
</div>

<div>
    <label>Couleurs</label>
    <input type=text name=couleurs>
</div>
</form>-->



<?php
    include 'includes/footer.php';
?>