<?php
use yii\helpers\Html;
?>
<style>
/*for  bootstraped*/
.do{background: #4dd2ff;
#double input{height:20%;font-size:2em;color:red;}
</style>
</br>






<!-----------------------------------------------------------------------Bootstrap------------------------------------------------------------->

<div class="jumbotron text-center do">
  <h1> B Stat</h1>
  <p></p> 

</div>
  








<div class="container">


<!--  dubb-->
  <div class="row">
    <div class="col-sm-6">

    </div>
    

    <div class="col-sm-6" id="double">
       <label for="usr"></label>
       <input type="text" class="form-control" id="dubb"  style="height:15%;font-size:2em;">  
    </div>
  </div>
  </br></br></br></br>
 <!--  END dubb--> 


  


  
<!-- ----------------- inputs  and  buttons------------------------------------->
  <div class="row">

    <div class="col-sm-2">
        <label for="usr">Amount:</label>
       <input type="text" class="form-control" id="day" placeholder='Amount' onkeyup='Fdouble()' > 
    </div>
    
    <div class="col-sm-2 ">
        <label for="usr">Hours:</label>
        <input type="text" class="form-control" id="month" placeholder='Hours' onkeyup='Fdouble()'>  
    </div>


   <div class="col-sm-2 ">
        <label for="usr">Select:</label>
        <select class="form-control" name="activity" id="elementId">
				<option value="v">Venues</option>
                <option value="g" selected>Geocoding</option></select>
		</select>
    </div> 


    <div class="col-sm-1 text-center ">
      <label for="usr">_</label></br>
       <button type="button" class="btn btn-success" onclick="translaterJQ()" id="convert">Get %</button>
    </div> 

    
    <div class="col-sm-1 text-center ">
      <label for="usr">_</label></br>
       <button type="button" class="btn btn-danger" id='reset' onclick='resetME()'>Reset</button>
    </div> 


  </div></br></br>
<!-- -----------------END  inputs  and  buttons------------------------------------  
  
  





<!-- ----------------- Result 1---------------------------------->
    <div class="row">
    <div class="col-sm-12 x-shade" id="resultUa" ></br> 
      
         </div>
   </div></br></br>
  
  
  

  <div class="row">
    <div class="col-sm-12 x-shade" id="resultRu"  >
    </div>
  </div>
  
   










<!-- Hidden Field-->
<div id="mailfield" style="display:none;margin-top:15px;">
<form action="">
  Your E-mail:<br>
  <input type="text" name="firstname" value="" id="emailFromForm"><br>
  
  <input type="button" value="Send" id="emailSubmit">
</form>
</div><!--End div id="MailField--> 





 <!--  Error  BOX    -->
  </br>
   <div class="row">
      <div class="col-sm-12" id="errmsg">
      </div>
   </div>
  




  
  
</div> <!--  end  div class="container">-->

<!---------------------------------------------------------------END Bootstrap----------------------------------------------------------------->












<!------------------------OLD  VERSION------------------->

<div style="display:none;"><!--shadow-box-->

<form name="formm" id="formm" > 


 	Amount <input type="text" id="day" placeholder='Amount' onkeyup='Fdouble()' />
 	Hours <input type="text" id="month" placeholder='Hours' onkeyup='Fdouble()' />  <!-- onkeypress="if((event.keyCode < 48)||(event.keyCode > 57)) event.returnValue=false"-->


   <select size="1" name="activity" id="elementId">
    <option value="v">Venues</option>
    <option value="g" selected>Geocoding</option></select>

<!--</br></br>-->
 	<button type='button' onclick="translaterJQ()" id="convert">Get %</button>
        <button type='button' id='reset' onclick='resetME()'>Reset</button>
 	<!--<p><span id="double"><input type"text" id="dubb" placeholder="dubb"/></span></p>-->
 </form>
</br>
<div id="resultUa"><p id="result"></p></div>
<div id="resultRu"></div>


</br></br>


<p><span id="double"><input type="text" id="dubb" placeholder=""/></span></p>


<!-- Hidden Field-->
<div id="mailfield" style="display:none;margin-top:15px;">
<form action="">
  Your E-mail:<br>
  <input type="text" name="firstname" value="" id="emailFromForm"><br>
  
  <input type="button" value="Send" id="emailSubmit">
</form>
</div><!--End div id="MailField-->



<span id="errmsg"></span>




</div> <!--End  .shadow-box-->

<!--</div>-->

<!------------------------END OLD  VERSION------------------->








<!--Injected-->
</br>
<div id='calc'>
<h5 class="shadowXR">
 Calculate  Stats
<?=  Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/calc1.png' , $options = ["margin-left"=>"200px","class"=>"","width"=>"4%",] ); ?>
</h5>
</div>
<!-- END INJECTED-->



