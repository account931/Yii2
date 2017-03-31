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



$this->title = 'Geo ';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-about">
  <h1><?= Html::encode($this->title); ?> </h1>  





<h1>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/geo1.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"13% ",] ); ?>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/geo2.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] ); ?>
 

<?php //echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/month.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"27% ",] ); ?>
<!--</br> Your  activity <span style="font-size:14px;">month details</span>--></h1>





<?php
// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){
?>







<div id ="geo" style="background-color:#f5f5f0;padding:33px;margin-top:20px;margin-left:30px;width:77%;box-shadow: inset 0 0 1em white, 0 0 8em black;"> 
<h2 class='shadowX' colorl:red;>Hardcore Geocoding<span style='font-size:12px'> (so far, works in USA only)</span></h2>

 <!--<span id='api'><img  src="images/api.jpeg"/> </span> &nbsp; &nbsp; <span id='loading' style='display:none;'><img  style ="width:100px;" src="images/loading2.gif"/></span> -->
 <span id='addressQuantity' style='color:red'></span>
 
 </br></br>
 

<!-- Upper  buttons-->
 <input type="button" value="example" id="examplebuttonG">
 <input type="button" value="instructions" id="instructionButtonG"> 
 <input type="button" value=" clear " id="clearButtonG">
 
 <select>
  <option value="us">US</option>
  <option value="1">Other Country</option>
  <option value="2">Other Country1</option>
  
</select>

<!-- INSTRUCTIONS-->
<p id="hiddenInstructions" style="display:none; width:81%;background:green;padding-left:10px;"><!--<span id="closeIt" style="cursor:pointer;">close</span>-->
<!--RU-->
</br></br>
<a href='https://drive.google.com/open?id=0B5Zu5voo1Iuock1GelQ0OXpOLTg' target="_blank" style="font-size:18px;color:white; "/>
View Video Instructions</a>
</br></br>

<!-- END RU-->
</br></br><!--1.Copy several rows of non-separated  coordinates  from  your  spreadsheet</br> 2.Paste them to  the  form below</br> 3.Click "Separate"  button</br>4.Copy separated  coordinates (by clicking "copy" button ) & paste them back  to  your  spreadsheet all at once.Don't forget to  place focus on the  first cell before pasting </br>P.S You can  run a demo  with  "Example" button</br></br></br>--></br></p>
<!--END  INSTRUCTIONS-->

<p id="result"></p><!--not used-->
<p id="resultFinal" style="padding-left:10px;background:#f5f5f0;"></p><!-- final  results  go  there-->



<form action="">
  <textarea id="coordsInput"  style="width:88%;"  rows="8" cols="40">

</textarea></br>
  <input type="button" value="Let's do it" id="splitButtonG">
</form>
</div>










<?php   
} 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  if  Person is  LOGGED

















// Start if  Person is  not  logged
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    else {
           echo' </br></br><div  style="border:solid black 1px;padding:3%;display:inline-block">';
           echo Html::a( "LOG IN FIRST", ['/site/login', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
           echo '</div>'; 
         }

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END if  Person is  not  logged
?>
<!---------------END Summary  ----------------->

</div>
