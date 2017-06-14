$(document).ready(function(){




//----------------------------------------------------
//
 $("#showData").click(function(){




   if(   $("#showData").text()=="&#21A7; show additional  data &#21A7;" )
	 {
         $("#hidden_data").show(1000); 
		 //$("#showData").text("hide"); 

				     // Slowly  change  text-------------
				     $("#showData").fadeOut("slow", function(){
				                                   $("#showData").text("&#8613; hide &#8613;");   
				                                   }).fadeIn("slow");
				      // End   Slowly  change  text------             
         
	 }else
	 {
      $("#hidden_data").hide(1000);
      //$("#showData").text("show additional  data"); 
          // Slowly  change  text-------------
				     $("#showData").fadeOut("slow", function(){
				                                   $("#showData").text("&#8615; show additional  data &#8615;");
				                                   }).fadeIn("slow");
		// End   Slowly  change  text------             
         
	 }



 });
//END Click
//***********************************************

















// END READY
});
