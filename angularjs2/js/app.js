var app = angular.module('introApp', []);

app.controller('mainCtrl', function($scope, $http) {
    
 $scope.nb_click = 0;

 



var url = "http://localhost/projet/php/ajax2.php"; // l'adresse du serveur que l'on souhaite obtenir, http était déclaré plus haut à coté du $scop, copier-coller

$http.get(url).then(function(res) { // fonction anonyme qui resoit la réponse, url, callback, res declaré la première fois ici

$scope.giocatori = res.data; //propriété data qui envoie les objets
 
 
})



$scope.changeOrder = function(key) {
    console.log('ok');
$scope.orderKey = key;
$scope.reverse = !$scope.reverse; // on inverse l'ordre du tri


};

}); 




 