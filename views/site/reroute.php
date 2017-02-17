<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//use yii\widgets\ListView;
//use yii\grid\GridView;
//use yii\data\ActiveDataProvider;// NOT MANDATORY
//use yii\widgets\DetailView;
//use yii\widgets\Pjax;// delete



$this->title = 'Re-route';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-about">
  <h1><?= Html::encode($this->title); ?> </h1>  









<!--  start--->
<div class="jumbotron text-center">
  <h1>Re-Routing</h1>
  <p>Use  re-routing  option from Waze  to  Google  Maps  and  vice versa</p> 
</div>







<div class="item contact padding-top-0 padding-bottom-0" id="contact1">
    	
    		<div class="wrapper grey">
    	
    			<div class="container">


    		
    				<div class="col-md-8"> <!--5-->
    			
    					<h3 class="margin-bottom-40 editContent">Option 1  <span class='subtext'> ( from Waze to  GMaps)</span></h3>





<!---------------------------------------------------FORm  Start------------------------------------------------->
    				
    					<form role="form">
    				
    						<div class="form-group">
    				    		<input  type="text" class="form-control input-lg" id="Wvalue" name="name" placeholder="Put Waze permalinkg ">
    				  		</div>
    				  	    				  	
    				  		<!--<div class="form-group">
    				  			<input type="email" class="form-control input-lg" id="email" name="email" placeholder="Put G Maps permalinkg">
    				  		</div>-->
    				  	
    				  		<!--<div class="form-group">
    				  			<input type="phone" class="form-control input-lg" id="phone" name="phone" placeholder="Your phone number">
    				  		</div>
    				  		
    				  		<div class="form-group">
    				  			<textarea class="form-control" rows="4" placeholder="Add comment..."></textarea>
    				  		</div> -->
    				  
    				    	<!--<label class="checkbox checked" for="checkbox1">
    				 			<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span><input type="checkbox" checked="" value="" id="checkbox1" data-toggle="checkbox">
    				    		Keep me in the loop
    				  		</label>-->
    				  	
    				  		<!--<hr>-->
    				  	
    				  		<button id="wToG" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">Submit request</button>
                            <button id="WReset" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide">Reset</button
    				
    					</form>
 <!---------------------------------------------------FORm  END------------------------------------------------->















    			
    					</br></br></br><hr></br></br><h3 class="margin-bottom-40 editContent">Option 2 <span class='subtext'> ( from GMaps to Waze)</span></h3>


<!---------------------------------------------------FORm 2  Start------------------------------------------------->
    				
    					<form role="form">
    				
    						
    				  	    				  	
    				  		<div class="form-group">
    				  			<input type="email" class="form-control input-lg" id="Gvalue" name="email" placeholder="Put Google Maps permalinkg">
    				  		</div>
    				  	
    				  		  				  	
    				  		<!--<hr>-->
    				  	
    				  		<button id="GtoW" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide">Submit request</button>
                            <button id="GReset" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide"> Reset </button>
    				
    					</form>
 <!---------------------------------------------------FORm 2 END------------------------------------------------->













    				</div><!-- /.col-md-5 --> <!-- END  <div class="col-md-5">-->








    			
    				<div class="col-md-3 col-md-offset-1"> <!-- 6-->
	    		
<!-----------------------Column 2  -Right----------------------------------------------------------->
	    				<div class="editContent" >
    					<!--<h5>Other ways to get in touch:</h5>-->
    				
    					<p class="text-light margin-bottom-40">
    						
    					</p>
                        <!--<img  src="https://qph.ec.quoracdn.net/main-qimg-92b6c82469eba49abe6f2ad2b4865a87?convert_to_webp=true"/>-->
	    				</div><!-- /.editContent -->
    				
    					
    				
    					
    			
    				</div><!-- /.col-md-6 -->
    		
    			</div><!-- /.container -->
    		
    		</div><!-- /.wrapper -->
    	
    	</div><!-- /.item -->
    
<!--- END ---->

























</div>
