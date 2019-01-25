$(document).on("keyup", "#apo_short_search_input" , function() { 
     var value = $("#apo_short_search_input").val(); 
  if (value.length == 0) {
         $('#apo_short_search_result').hide();
        
    } else {
        shortSearch(value);
    }   
});

// This function helps to send the request to retrieve data from mysql database...
function shortSearch(val){
 $('#apo_short_search_result').show();
 $.post('short_search.php',{'search-data': val}, function(data){
     
  if(data != "")
   $('#apo_short_search_result').html(data);
 }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
     
 alert(thrownError); //alert with HTTP error
         
 });
}
