<?php

include_once 'connexion_db.php';


function getTeams() {
    $db = connect();
    $query = $db->prepare('SELECT * FROM equipe');
    $query->execute(); //binder en valeur
    return $query->fetchAll();

}

function getTeamById($id) {
    $db = connect();
    $query = $db->prepare('SELECT * FROM equipe WHERE id = :id');
    $query->execute(array(':id' => $id));
    return $query->fetch();
}

function getLogo() {
    $db = connect();
    $query =  $db->prepare('SELECT logo FROM equipe');
    $query->execute();
    return $query->fetch();

}

//option de formatage, prend des données brut et les formatent
function selectFormat($teams) {
    $output = '<select name="equipe">'; //absolument donner un name, sans qou il ne part pas au serveur

    foreach ($teams as $team) {
        $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>'; /// au serveur on va envoyer l'identifiant de l'équipe
    }

    $output .= '</select>';


    return $output;
}

    function tableFormat($teams) { // afichafe d'équipe sur page equipes
    $output = '<table class = "table table-striped equipe">'; //absolument donner un name, sans qou il ne part pas au serveur, class equipe crée
    $output .= '<tr><th>Nom</th><th>Entraineur</th><th>Couleurs</th><th>Logo</th></tr>';



    foreach ($teams as $team) {
        $output .='<tr>';
        $output .='<td>'.$team['nom'].'</td>';
        $output .='<td>'.$team['entraineur'].'</td>';
        $output .='<td>'.$team['couleurs'].'</td>';
        $output .='<td><img src="'.$team['logo'].'"></td>';
        $output .='</tr>';
    }

    $output .= '</table>';


    return $output;
   }


function selectFormatWithOpt($teams, $opt) {
    $output = '<select name="equipe">'; //absolument donner un name, sans qou il ne part pas au serveur

    foreach ($teams as $team) {
        if ($team['id'] == $opt) {
            $output .= '<option selected value="'.$team['id'].'">'.$team['nom'].'</option>'; /// au serveur on va envoyer l'identifiant de l'équipe

        } else {
            $output .= '<option value="'.$team['id'].'">'.$team['nom'].'</option>'; /// au serveur on va envoyer l'identifiant de l'équipe

        }
        
    }

    $output .= '</select>';


    return $output;

}

function createTeam($team) {
    $db = connect();
    $query = $db->prepare('INSERT INTO equipe (nom, entraineur, couleurs, logo) VALUES (:nom, :entraineur, :couleurs, :logo)');
    $result = $query->execute(array(
        ':nom' => $team['nom'],
        ':entraineur' => $team['entraineur'],
        ':couleurs' => $team['couleurs'],
        ':logo' => $team['logo']
        ));
    return $result; //boolean (vrai si succès, faux si échec)

}

?>
