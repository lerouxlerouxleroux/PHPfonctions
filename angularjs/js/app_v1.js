// .module(arg1, arg2)
//arg1 : nom du module
// arg2 : tableau des dépendances (autres modules chargés)

var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) {
    $scope.nb_click = 0;
    $scope.orderKey = "age"; //critère de tri initial 
    $scope.reverse = false; // par défaut tri croissant (pas d'inversion)                                                                                                                                        
    $scope.message = "coucou"; //ajout d'une propriété message à l'objet scop, injection de chaines de caractères dans le scop 
    //(espace d'échange entre la vue et le controller)


// variable non accessible à la vue
var equipes = [
  {name: 'Juventus'}, //création d'objet
  {name: 'Strasbourg'},
  {name: 'Monaco'},
  {name: 'PSG'}

]; // tant que ce n'est pas dans scop le tablea n'est pas visible

function getPlayers() {
    var url = "http://localhost/projet/php/ajax2.php"; // l'adresse du serveur que l'on souhaite obtenir, http était déclaré plus haut à coté du $scop, copier-coller
$http.get(url).then(function(res) { // fonction anonyme qui resoit la réponse, url, callback, res declaré la première fois ici
    //console.log(res.data); //propriété data qui envoie les objets
$scope.giocatori = res.data; //
//modification de la source des données en fonction
//
/*$scope.giocatori.forEach(function(joueur){
    if 
        (joueur.equipe == 0) {
            joueur.equipe_nom = "sans equipe"
        }
    
});*/


}); //

}

// requête ajax via le service $http
// méthode qui sera éxecuté une fois que le serveur aura répondu

$scope.teams = equipes; // nous exposons les equipes: ils sont accessible à la vue via le $scope

$scope.changeOrder = function(key) {
    console.log('ok');
$scope.orderKey = key;
$scope.reverse = !$scope.reverse; // on inverse l'ordre du tri


};


$scope.deletePlayer = function() {
    //this retourne le "contexte"  du bouton cliqué
    //on obtien ainsi les données incluses dans la même ligne (tr)
    //que le bouton cliqué
    //this.g (g est généré par le ng-repeat) et retourne
    //les données du joueur que l'on veut supprimer 
   
    var player_id = this.g.id; 

 //1console.log(this.g.id); //renvoie un scop par ligne

 // requete ajax pour supprimer le joueur identifier
var url = "http://localhost/projet/php/deletePlayer.php?id=" + player_id + "&ajax=true"; //ou php?ajax=true&id=" + player_id; association clé valeur

 $http.get(url).then(function(res) { // fonction executé au rétour de la réponse du serveur
    console.log(res.data);
    getPlayers(); //on recharge le tableau des joueurs

 });
};

//chargement des joueurs
getPlayers();
});

