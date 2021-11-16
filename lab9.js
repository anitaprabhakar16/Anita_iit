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
         var output = "<ul>";  //makes it into one list 
         $.each(responseData.menuItem, function(i, menuItem) {
            output += '<a href="' + menuItem.menuURL + '" target="_blank">';
        	  output += menuItem.menuName;
        	  output += '</a> &emsp;'; //adds spacing 
      });
      output += "</ul>";
      $('#flickrOutput').html(output);
    }
    });
});



