<?php
include 'includes/connexion_db.php';
$db = connect();
/*$db = connect();
$query = $db->prepare('
SELECT joueur.nom, joueur.prenom, joueur.age, joueur.equipe, joueur.num_maillot, equipe.nom AS
equipe_nom
FROM joueur, equipe 
WHERE joueur.equipe = equipe.id
')*/
//nouvelle syntaxe pour la jointure interne
//INNER JOIN: jointure interne, restrictive. 
//Elimine les lignes qui n'ont pas de correspondance dans l'autre table

//LEFT JOIN: jointure externe, ouverte. Inclut les lignes n'yant pas de correspondance dans l'autre table (colonnes manquantes remplies par NULL)
$query = $db->prepare('
SELECT joueur.id, joueur.nom, joueur.prenom, joueur.age, joueur.equipe, joueur.num_maillot, equipe.logo AS equipe_logo, equipe.nom AS
equipe_nom
FROM joueur
LEFT JOIN equipe 
ON joueur.equipe = equipe.id
ORDER BY  joueur.nom ASC, joueur.age ASC
'); // ASC trier par nom et par ordre alphabétique ASC ou DESC
$query->execute();
$results = $query->fetchAll(); // réponses sql sont transformé en tableau associatif php

// faire le nettoyage de donnéees avant l'envoie au client
/*foreach ($results as$result) {
    $result['nom'] = 'toto';*/
//}
// Modification des données (majuscule, minuscule, etc) avant l'envoie au client


for ($i=0; $i < sizeof($results); $i++) {
    //$results[$i]['nom'] = ucfirst($results[$i]['nom']); // initiales en majuscules
    $results[$i]['nom'] = strtoupper($results[$i]['nom']); // initiales en majuscules

   

//si le joueur n'est relié à aucune équipe, on modifie sa propriété "equipe_logo" en lui assignant le lien ver le logo pole emploie
    if ($results[$i]['equipe']==0) // si joueur est sans éuqipe
    {
        $results[$i]['equipe_nom'] = "Sans equipe";
        $results[$i]['equipe_logo'] = "img/logo/pole-emploi.jpg";
    }
}

echo json_encode($results);


?>