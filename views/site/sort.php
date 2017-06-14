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



$this->title = 'Sort un-sorted ';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-about">
  <h1> <?= Html::encode($this->title); ?> </h1> 
</div>













<div class="jumbotron text-center" style =' background-color: #2ba6cb;'>
  <h1>Re-sort</h1>
  <p>Re-sort Unsorted</p> 
</div>







<div class="item contact padding-top-0 padding-bottom-0" id="contact1">
    	
    		<div class="wrapper grey">
    	
    			<div class="container">


				
				
				
    		
    				<div class="col-md-5"> <!--5-->
    			
    					<h3 class="margin-bottom-40 editContent">Column 1  <span class='subtext'> sheet1</span></h3>





<!---------------------------------------------------FORm  Start------------------------------------------------->
    				
    					<form role="form">
    				
    						<!--<div class="form-group">
    				    		<input  type="text" class="form-control input-lg" id="Wvalue" name="name" placeholder="Put Waze permalinkg ">
    				  		</div>-->
    				  	    				  	
    				  		<!--<div class="form-group">
    				  			<input type="email" class="form-control input-lg" id="email" name="email" placeholder="Put G Maps permalinkg">
    				  		</div>-->
    				  	
    				  		<!--<div class="form-group">
    				  			<input type="phone" class="form-control input-lg" id="phone" name="phone" placeholder="Your phone number">
    				  		</div>-->
    				  		
    				  		<div class="form-group">
    				  			<textarea class="form-control" rows="4" placeholder="Column1" id='col1' required></textarea>
								
    				  		
    				  			<!--<textarea class="form-control" rows="4" placeholder="Column 2" id='col2'></textarea>-->
    				  		</div>
    				  
    				    	<!--<label class="checkbox checked" for="checkbox1">
    				 			<span class="icons"><span class="first-icon fui-checkbox-unchecked"></span><span class="second-icon fui-checkbox-checked"></span></span><input type="checkbox" checked="" value="" id="checkbox1" data-toggle="checkbox">
    				    		Keep me in the loop
    				  		</label>-->
    				  	
    				  		<!--<hr>-->
    				  	   <!--<select size="1" name="activity" id="elementId">
                                     <option value="v" selected>1  column</option>
                                     <option value="g" >2 columns</option>
                           </select></br></br>
										
    				  		<button id="wToG_sort" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">Submit request</button>
                            <button id="WReset" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide">Reset</button >
							<button id="example1" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">Ex1</button>-->
    				
    					<!--</form>-->
 <!---------------------------------------------------FORm  END------------------------------------------------->















    			
    					


<!---------------------------------------------------FORm 2  Start------------------------------------------------->
    				
    
 <!---------------------------------------------------FORm 2 END------------------------------------------------->













    				</div><!-- /.col-md-5 --> <!-- END  <div class="col-md-5">-->







<!-----------------------Column 2  -Right----------------------------------------------------------->
    			
    				<div class="col-md-5 col-md-offset-1"> <!-- 6-->
					<h3 class="margin-bottom-40 editContent">Column 2  <span class='subtext'> sheet2</span></h3>
	    		

	    				<div class="editContent" >
    					<div class="form-group">
    				  			
    				  		
    				  			<textarea class="form-control" rows="4" placeholder="Column 2" id='col2'></textarea>
								
    				  		</div>
							
							
    				
    					</form>
							
	    				</div><!-- /.editContent -->
    				
					
		   			
    				</div><!-- /.col-md-6 -->
					
					





<!-------------------------------------------------------START BUTTONS---------------------------------------->
                                        <!--mine-->
					</br>
					<div class="col-md-8"  id="" style="margin-top:33px;">  


    				  	   <select size="1" name="activity" id="elementId">
                                     <option value="v" >1  column</option>
                                     <option value="g" selected>2 columns</option>
                                      <option value="c_name">column+name</option>
                           </select></br></br>
										
    				  		<button id="wToG_sort" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">Submit request</button>
                            <button id="WReset" type="button"  class="btn btn-primary btn-embossed btn-lg btn-wide">Reset</button >
							<button id="example1" type="button" class="btn btn-primary btn-embossed btn-lg btn-wide">Example</button>
    				</div>
<!-------------------------------------------------------START BUTTONS---------------------------------------->






					
					
					<!--------------------------------mine RESULTS------------------------------------->
					</br></br>
					<div class="col-md-8"  id="resultFinal_sort" style="margin-top:33px;">   </div> </br></br></br>
					<!--------------------------------- end  mine-------------------------------------->
					
    		                          

                                        

    			</div><!-- /.container -->
				
				
				
					
					
					
    		
    		</div><!-- /.wrapper -->

                <div style="height:77px;"></div>


    	
    	</div><!-- /.item -->
    
