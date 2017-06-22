// .module(arg1, arg2)
//arg1 : nom du module
// arg2 : tableau des dépendances (autres modules chargés)

var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) {
    var url_serveur ="http://localhost:8000"; // symfony écoute le port 8000

   
    //indicateur permettant de savoir si le formulaire doit être geré
    //en mode insertion ou bien en mode mis à jour
    $scope.updateMode = false; // Mode insertion par défaut
    $scope.visibleForm = false; // formulaire est masué par défaut ou true -formulaire visible par défaut

    $scope.nb_click = 0;
    $scope.orderKey = "age"; //critère de tri initial 
    $scope.reverse = false; // par défaut tri croissant (pas d'inversion)                                                                                                                                        
    $scope.message = "coucou"; //ajout d'une propriété message à l'objet scop, injection de chaines de caractères dans le scop 
    //(espace d'échange entre la vue et le controller)
    $scope.maillot_range = []; // tableau destiné à alimenter les options 

// variable non accessible à la vue
var equipes = [
  {name: 'Juventus'}, //création d'objet
  {name: 'Strasbourg'},
  {name: 'Monaco'},
  {name: 'PSG'}

]; // tant que ce n'est pas dans scop le tablea n'est pas visible

function getPlayers() {
    // requete ajax via le service $http
    var url = url_serveur + "/json/players"; // l'adresse du serveur que l'on souhaite obtenir, http était déclaré plus haut à coté du $scop, copier-coller
    $http.get(url).then(function(res) { // fonction anonyme qui resoit la réponse, url, callback, res declaré la première fois ici
            console.log(res.data); //propriété data qui envoie les objets
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


function buildNumeroList() {
    for (var i=1; i<1000;i++) 
    {
     $scope.maillot_range.push(i);
    };

 }


function initPlayer () {
    $scope.player = {
        nom: null,
        prenom: null,
        age: null,
        num_maillot: "1", //valeur par dafaut
        equipe:"0"
    };
}

// requête ajax via le service $http
// méthode qui sera éxecuté une fois que le serveur aura répondu

$scope.teams = equipes; // nous exposons les equipes: ils sont accessible à la vue via le $scope

$scope.changeOrder = function(key) {
    console.log('ok');
    $scope.orderKey = key;
    $scope.reverse = !$scope.reverse; // on inverse l'ordre du tri
};

$scope.savePlayer = function() {
    //requete ajax pour ajouter un joueur
    var url =  url_serveur; //association clé valeur
    $http.post(url, {player: $scope.player}).then(function(res) { //envoie au serveur et fonction executé au rétour de la réponse du serveur
    //console.log(res.data);

    getPlayers(); //on recharge le tableau des joueurs
//effacer les champs du formulaire
// réinitialise les champs nà vide etb repasse en mode insertion
$scope.clearForm();
 });
};

$scope.editPlayer = function() {
   //console.log(this.g);
     $scope.player = this.g // on copie les valeurs du joueurs dans les propriétés du scope
     $scope.updateMode = true;
     $scope.visibleForm = true;
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
var url =  url_serveur + "?action=delete&id=" + player_id; //association clé valeur

 $http.get(url).then(function(res) { // fonction executé au rétour de la réponse du serveur
    console.log(res.data);
    getPlayers(); //on recharge le tableau des joueurs

 });
};



$scope.clearForm = function() { // détruit l'ensemble des propriétés en l'écrasant par un objet vide
    initPlayer();
    $scope.updateMode = false;
}



    //chargement des joueurs
getPlayers();


buildNumeroList();
    //$scope.player = {nom: 'dd' prenom 'dd'};

initPlayer();
    //initialisation du formulaire d'ajout de joueur



});

