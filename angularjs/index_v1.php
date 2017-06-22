<!DOCTYPE html>
<html ng-app="introApp">
<head>
    <title>Angularjs Intro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <style>
        th {
            cursor:pointer;
        }
        
        table img {
            width: 40px;
            height:20px;
        }
    </style>
</head>
<body>

<?php 
    include '../includes/menu.php'; 
    include '../includes/equipe.inc.php';
?>


 
    

    <h1>Angularjs Intro</h1>


    <div ng-controller="mainCtrl">
    <!--checkbox pour affichage du formulaire-->
    <input type="checkbox" ng-model="visibleForm">
    <span ng-if="!visibleForm">Afficher</span>
    <span ng-if="visibleForm">Masquer</span> le formulaire

         <!--formulaire d'ajout/mise à jour d'un joueur-->
    <div ng-show="visibleForm" class="well">
         <input ng-model="player.nom" type="text" placeholder="Nom">
         <input ng-model="player.prenom" type="text" placeholder="Prénom">
         <input ng-model="player.age" type="text" placeholder="Age">
         
         <label>Numéro</label>
         <select ng-model="player.num_maillot">
             <option ng-repeat="n in maillot_range">{{n}}</option>
         </select>
  
         
         <label>Equipe</label>
         <?php echo selectFormat(getTeams()); ?>

        
         <button ng-click="savePlayer()" class="btn btn-primary btn-xs">
         <span ng-if="!updateMode">Ajouter</span>
         <span ng-if="updateMode">Mettre à jour</span>
         </button>
         <button ng-click="clearForm()" class="btn btn-default btn-xs">Effacer</button>
         <span id="message"></span>
         
    </div>
  
   <!-- <ul style="display:none">

        <li ng-repeat="joueur in joueurs">
        {{joueur.name}} ({{joueur.age}}ans)
        </li>
    
    </ul>-->
   
<!--filtres-->
    <div>
    <!--ng-model surveille la valeur d'un input et l'attache au $scop-->
        <input ng-model="search" type="text" placeholder="Recherche">
        <select ng-model="selectedTeam"> <!--on rahoute au scoop une selected team-->
            <option value="">Toutes les équipes</option>
            <option ng-repeat="team in teams">{{team.name}}</option> <!--repeté autant de fois que teams-->
        </select>

     </div>

    <p>{{filteredGiocatori.length}} / {{giocatori.length}}</p> <!--Nombre de joueurs filtrés sur nombre total-->

    <div ng-hide="true"> <!--masquer-->
     <button 
        ng-click="nb_clicks = nb_clicks + 1">
        Click
        </button> {{nb_clicks}}
     </div>



    <table class="table table-striped">
    <tr>
        <th ng-click="changeOrder('nom')">Nom</th>
        <th ng-click="changeOrder('prenom')">Prénom</th>
        <th ng-click="changeOrder('age')">Age</th>
        <th ng-click="changeOrder('num_maillot')">Numéro</th>
        <th ng-click="changeOrder('equipe_nom')">Equipe</th>
        <th>Actions</th>
    </tr>
        <tr ng-repeat="g in filterGiocatori=(giocatori |
         filter:search | 
         filter:selectedTeam |
          orderBy:orderKey:reverse)"> <!--g est un tabelau d'objet, search est une propriété du scop qui rend une valeur déterminée, rechercher en temps réel, a la saisie-->
            <td>{{g.nom}}</td>
            <td>{{g.prenom}}</td>
            <td>{{g.age}}</td>
            <td>{{g.num_maillot}}</td>
            <td>
                <span ng-if="g.equipe !=0">{{g.equipe_nom}}</span> <!--une insertion conditionnelle dans le DOM manière de procéder dans la vue sans recours au controlleur-->
                <span ng-if="g.equipe==0">Pole Emploi</span>
            </td>
         
            <td><img ng-src="../{{g.equipe_logo}}"></td>
            <td>
            <button ng-click="editPlayer()" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span>
                </button>
                <button ng-click="deletePlayer()" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span>
                </button>
    
            </td>
        </tr>          

    </div>
     


<script src="js/angular.min.js"></script>
<!--<script src="js/app_v1.js"></script>-->
<script src="js/app.js"></script>
</body>
</html>