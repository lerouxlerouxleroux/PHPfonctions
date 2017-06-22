//alert ('ciao');
console.log('JS ok');
var list = document.getElementById('list'); // on le fait une fois, element était copie et référence, renvoie un pointeur designé list sur players.php
var reset = document.getElementById('reset');
var ajax = document.getElementById('ajax');
var message = "Bonjour à tous";
var nbClics = 0;
 

function test() {
    console.log(message); //la visibilité des variables, la fonction test voit la variable message
}


function addLi() {
    //incrémentation du nombre de clics
    if (nbClics < 5) {
    //.createelement genère une balise html
        var li = document.createElement('li'); 
        li.innerText = message; //var message declaré plus haut
        list.appendChild(li);
        nbClics++;
      }

}

function addLi2(text) {
    //incrémentation du nombre de clics
    if (nbClics < 5) {
    //.createelement genère une balise html
        var li = document.createElement('li'); 
        li.innerText = text; //var message declaré plus haut
        list.appendChild(li);
        nbClics++;
      }

}

function emptyList() {

   //list.innerHTML = ''; // j'enlève tout le balisage interne
   //list.innerHTML += '<li>jhj</li>'; // injection de balise html pour remplacer
   while (list.firstChild) { // tanque la liste a un enfant
        list.removeChild(list.firstChild); // à chaque passage de boucle on liquide le premier 'enfant'

   }  nbClics = 0;// réinitialisation du compter, pour que ça repart en sortie de boucle
}

function getData() {
    console.log ('Requête ajax');
    var url = 'http://localhost/projet/php/ajax.php';// deuxième argument de req.opet après GET
    var req = new XMLHttpRequest(); //implementé au coeur du javascript, c'est du ajax
    req.open('GET', url, false);
    req.send(null); // on envoie aucune donnée suplémentaire

    if (req.status == 200) {
        // instructions à exécuter en cas de succes
        //console.log("réponse du serveur:" + req.responseText);
        var res = req.responseText;
        console.log(typeof res);// renvoie string
        //addLi2(req.responseText);
        console.log(res[0]); // ne renvoie pas "chiellini" mais "["
        
        
        var resArray = JSON.parse(res); //JSON.parse transforme la chaine JSON en objet/tableau, on dispose de tableau manipulable
        console.log(resArray);
        console.log(typeof resArray);// renvoie renvoie objet (structure objet js)
        //addLi2(req.responseText);
        console.log(resArray[0]); // ne renvoie pas "chiellini" mais "["

        addLi2(resArray[0]); // renvoie Chiellini


    } else {

    }
}


//écouteur d'événement
document
.getElementById('btn')
.addEventListener('click', addLi); // parametres, ce qu'on veut détecte et ce qu'on veut déclencher

 //$('btn').click(test); en jquery
 reset.addEventListener('click', emptyList);
 ajax.addEventListener('click', getData);
