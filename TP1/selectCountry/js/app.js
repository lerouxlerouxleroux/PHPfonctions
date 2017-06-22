var pays_infos = []; // tableau vide, mise en cache des données, permettant de mettre en cache le retour des requetes ajax

$('select').on('change', function() {
    var option= $(this).val();
    //console.log ($option);
    // si pays selectionné => requete ajax
    if (option > 0) {
        // on affiche la fiche pays
        $('#pays_infos').show(); //affichage, ou masque l'option qui n'est pas zéro
       

       
        var index_pays = isCountryInArray(pays_infos, option);
          
          if (index_pays !=-1) {
            // pays déja présent dans le tableau
              displayCountryData(pays_infos[index_pays]);
          }

         else { // == -1
          //pays non présent = requete ajax

        var url = 'http://localhost/projet/php/TP/selectCountry/pays.php?id='+option // on fourni l'identifiant dans la parametre url
        $.get(url, function(data) {
 // execution au retour, mais c'est événements réseau
 // affichage des données dans la page
   //MANIPULATION DE DOM, après la réception de s données console.log
   var pays = JSON.parse(data); // conversion de la chaine JSON en tableau JS
     //console.log()     
     displayCountryData(pays_info); // pays entre paranthèses,
     //mise en cache des données
     pays_infos.push(pays);
     
     }); //bloc qui a été coupé et place ici dans else


        }





      

    } //affichage grace au zepto

function displayCountry(country) {
    var spans = $('#pays_infos'); //id dans html
   // console.log(span);
   spans.eq(0).text(country.capitale);
   spans.eq(1).text(country.nb_habitants);
   spans.eq(2).text(country.superficie);
   spans.eq(3).text(country.langue);
   $('img.flag').attr('src', country.drapeau);
}


function isCountryInArray(arr, id) { // on va vérifier si l'identifiant est dans le tableau
  var found= -1; //:-1 signifie "aucun indice correspondant"
  arr.forEach(function(item, index) { //item est incremente
 if (item.id == id) {
      found = index; // pays recherché trouvé
 }
  });
  return found; // renvoie l'indice du pays trouvé
}
});