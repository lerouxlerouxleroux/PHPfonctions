
$('select').on('change', function() {
     var option = $(this).val();

if (option > 0) {

var url = 'http://localhost/projet/php/TP1/selectCountry/pays.php'+option;
 $.get(url, function(data) {
 var pays = JSON.parse(data); 
  displayCountryData(pays);
    
     }); 
}



function displayCountry(country) {
var spans = $('#pays_infos span'); //id dans html
   // console.log(span);
   spans.eq(0).text(country.capitale);
   spans.eq(1).text(country.nb_habitants);
   spans.eq(2).text(country.superficie);
   spans.eq(3).text(country.langues);
   $('img.flag').attr('src', country.drapeau);


}

});
