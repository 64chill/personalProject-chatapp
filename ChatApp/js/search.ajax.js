$( document ).ready(function() {

$('#sInput').keyup(function(){
 contactServerGetResults($(this).val());

});




});

function contactServerGetResults(inputtxt){

   $.ajax({
     url:'js/ajax/ajax_search.php', //who to contact?
     type: 'POST',
     data: {method: 'getMyData', txt: inputtxt }, // send variable ?method=getMyData by POST
     success: function(data){ // if success
           $('#searchResults').html(data); // where to inport the data
     }
   });
}
