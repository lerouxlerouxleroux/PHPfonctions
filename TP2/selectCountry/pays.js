var pays=null;

function getPays() {
    var url = 'http://localhost/projet/php/TP/selectCountry/ajaxPays';
 
    $.get(url, function(data) {
      
       pays = JSON.parse(data);
       console.log (pays);
    });
}

getPays();

function showPays(name){
    var pays = getPays();
    $.each(pays,function(){
        if(pays.name == name){
            $('#capitale').html(pays.capitale);
            $('#nombre_habitants').html(pays.nb_habitants)
            $('#superficie').html(pays.superficie);
            $('#langues').html(pays.langues);
            $('#drapeau').html(pays.drapeau);
        }
    });
}