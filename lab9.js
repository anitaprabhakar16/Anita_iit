$(function() {
    $( "#menu" ).menu();
 });

$( function() {
  $( "#progressbar" ).progressbar({
    value: 41.11
  });
} );
 

$(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "lab9json.json",
        dataType: "json",
        success: function(responseData, status){
         var output = "<dt>";  //makes it into one list 
         $.each(responseData.menuItem, function(i, menuItem) {
            output += '<li><a href="' + menuItem.menuURL + '" target="_blank">';
        	  output += menuItem.menuName;
        	  output += '</a> &emsp;</dt>'; //adds spacing 
            output += '<dd>'+ menuItem.menuDesc + '</dd>';
            output += '<br />'
      });
      output += "</dl>";
      $('#flickrOutput').html(output);
    }
    });
});



