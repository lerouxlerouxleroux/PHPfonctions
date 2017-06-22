
 
 // source de données globale (toutes les fonctions y ont accès)
var players = null;

var ageAsc = false; //booléen permettant de savoir si les joueurs 
// sont triés par age ascendant
var nomAsc = true;
var filterAge = null; // au départ, aucun filtre sur l'âge;



//***Fonctions***
function getPlayers() {
    var url = 'http://localhost/projet/php/ajax2.php';
    console.log(players);
    $.get(url, function(data) { // fonction locale n'existe qu'à cet endroit,  
       // data contiendra les données envoyées par le serveur
       players = JSON.parse(data);
       displayTable(players); // fonction responsable 
       //de l'affichage d'un tableau de joueurs
      
});


}

function displayTable(players) {  // tableau players en js //n'est pas encore accroché au doms
    var table = '<table class="table table-striped">';
    //entete
    table += '<tr><th id=nomHeader>Nom</th><th>Prenom</th><th id="ageHeader">Age</th><th>Numéro</th><th>Equipe</th></tr>';

    var oldest = _.max(getAges(players)); //recupère l'age le plus élévé
    console.log(oldest);

    //boucle
        players.forEach(function(player) {
        table += '<tr>';
        table += '<td>'+player.nom + '</td>';
        table += '<td>'+player.prenom + '</td>';
        if (player.age == oldest) {

                table += '<td class="oldest">'+player.age + '</td>';

        } else {


                table += '<td>'+player.age + '</td>';
        }
       
        
       
        table += '<td>'+player.num_maillot + '</td>';
        
        if (player.equipe_nom == null) {
            table += '<td>Sans équipe</td>';
        } else {
            table += '<td>'+player.equipe_nom + '</td>';
        }
         
        table += '</tr>';
    });

    table += '</table>'; // concaténation, affectations
    $('#listPlayers').html(table); //" "localise moi" on injecte du code html dans la table
}

function hidePlayers(ageLimit) {
    var nbResults = 0;
    var rows = $('table tr'); // on récupère les lignes de tableau
    $.each(rows, function(index, row) {
    // récupération de l'age du joueur
   // $.each()
   
// on cible la ligne par ZEPTO afin "d'envelopper" l'element
// de nouvelles capacités (propriété et méthodes)
   var r = $(row); // r est plus riche en fonctionnalités 
   // que row
   
   var age = r.children().eq(2).text(); //on veut deuxième enfant, chainage
   //if (age > ageLimit && age != 'Age') {
   if (age > ageLimit && index != 0) { 
        r.hide();
   } else {
        r.show();
        nbResults++; //incrementer à chaque fois que la ligne est visible
   }

   //var ageCrade = row.children[2]; //exemple: <td>28</td>
   //console.log (typeof ageCrade); //vérifie qu'age crade est une chaine de caractere
  //var age = ageCrade.substr(4,2);
  });


    //on affiche le résultat dans le DOM
    //-1 pour ne pas compter la ligne d'entête
    $('#nbResults').html(nbResults-1);
}



function getAges(players) {
    var ages = []; //on initialise un tableau vide
        
        players.forEach(function(player) {
            ages.push(player.age); // push ajoute un élément dans le tableau

        });

    return ages; // on retourne le tableau des ages

}

function getFormValues(form) { // recupère tous les inputs situés dans le formulaire fourni dans la fonction
   

    var inputs = form.children('input');

    var nom         = inputs.eq(0).val(); //récupère la valeur du premier input trouvé

    var prenom      = inputs.eq(1).val();
    var age         = inputs.eq(2).val();
   
    // renvoie un tableau de deux balises select
    var selects     = form.children('select');
   
    var maillot     = selects.eq(0).val();
    var equipe     = selects.eq(1).val();

    //console.log(nom + ' ' + prenom + '' + maillot);
   // création d'un objet values permettant de stocker 
   //toutes les valeurs à transmettre au serveur
   var values = { // l'objet est structuré par l'association d'objet et de valeurs
        nom: nom,
        prenom: prenom,
        age: age,
        maillot: maillot,
        equipe: equipe
    };

    return values;
}


function checkValues(player) { // player est un objet
    var conditions = 
            player.nom.length > 1 &&
            player.prenom.length > 1 &&
            player.age.length > 1;

        return conditions;
}


function clearMessage(timer) {

    var message = $('#message');
    setTimeout(function() {
        message.text('').removeClass(); // efface le text situé dans l'élément #message
    }, timer);
}




//***Ecouteurs d'événements (eventListener)***
 // appel de la fonction au chargement du script
$('#selectAge').on('change', function() { // le type d'événement que l'ont veut écoute et la fonction qui va l'exécuter
    
    // val () récupère la valeur de l'l'ment de formulaire, ici balise select, this fait référence à l'element-porteur évenement
    filterAge = $(this).val(); 
    
    // val() lit une valeur, val('..') ecrit une valeur
    hidePlayers(filterAge);

});

//Lorsque l'element #ageHeader EXISTERA dans le dom; JS placera 
// un écouteur d'événement click dessus
$(document).on('click', '#ageHeader', function() { // lecouteur se mettre sur l'element qui viendra en futur en fonction du parent
      if (ageAsc) {
        
            var sortedPlayers = _.reverse(_.sortBy(players, ['age'])); 

        } else {
                
                var sortedPlayers = _.sortBy(players, ['age']);  
        }
        
        ageAsc = !ageAsc;   
        
        displayTable(sortedPlayers);  
    
     if (filterAge) { // si variable filterAge différent de null ou false ou undefined
            
            hidePlayers(filterAge); //on masque les joueurs dont l'age 
            //est supérieur à la valeur stockée dans filterAge
        }
});
 
 $(document).on('click','#nomHeader', function() { // lecouteur se mettre sur l'element qui viendra en futur en fonction du parent
      if (nomAsc) {
        
            var sortedPlayers = _.reverse(_.sortBy(players, ['nom'])); 

        } else {
                
                var sortedPlayers = _.sortBy(players, ['nom']);  
        }
        
        nomAsc = !nomAsc;   
        
        displayTable(sortedPlayers);  

    if (filterAge) {
            hidePlayers(filterAge);
        }
});

$('#displayFormPlayer').on('click', function() {
    var text = ' le formulaire pour ajouter un joueur';

    //$('#formPlayer').toggle();//ciblage absolu
    var form = $(this).next();// xciblage relatif
    form.toggle(); //next c'est la balise suivante à toucher, toggle est pour cacher et faire réapparaitre


    //changer le text du lien en fonction de la
    //visibilité du formulaire
var status = form.css('display'); // afficher le retour de la fonction css display
if (status == 'none') {
    $(this).text('Afficher' + text);
} else {

$(this).text('Masquer' + text);

}


});


$('#formPlayer button').on('click', function() {

    var form = $('#formPlayer');

    // création d'un objet player à partir des valeurs
    // récupérées dans le formulaire
    var player = getFormValues(form);
    var check = checkValues(player); //player vient de la ligne précédente
    console.log(check);

    

if (check) {
//requete AJAX en POST
    var url = 'http://localhost/projet/php/ajaxAddPlayer.php';
    $.post(url, player, function(data) { 
        

// si php a renvoyé 1(requete sql executée avec succes)
        if(data == 1) { //recharge la liste des joueurs

        getPlayers(); // recharge la liste des joueurs

        $('#message')
        .text('L\'enregistrement a réussi')
        .removeClass()
        .addClass('bg-success text-success');


        } else {

                $('#message').text('L\'enregistrement a échoué')
                .removeClass()
                .addClass('bg-danger text-danger');
        

        }
         
    });


      } else {
        //afficher message d'erreur si les conditions de validations non remplies
     $('#message').text('Formulaire non valide')
      .removeClass()
      .addClass('bg-danger text-danger');
       
     
   
    }

clearMessage(5000);

});


//**************
// chargement de la liste des joueurs
getPlayers(); // appel de la fonction au chargement du script

