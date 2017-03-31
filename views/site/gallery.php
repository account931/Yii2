<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView; //used  in ListView
use yii\data\ActiveDataProvider;//Not  mandatory   to use 
//use yii\helpers\Html; 


$this->title = 'Upload  file';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-signup">
   <h1><?= Html::encode($this->title) ?></h1>
   <?php  if(Yii::$app->user->isGuest) {echo "<h3>you are  not  logged,log in to  view  your  uploads</h3>";} ?>





<?=Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/upload.jpg' , $options = ["margin-left"=>"200px","class"=>"","width"=>"28%",] ); ?>

 <?php  echo '</br>'; ?>





<?php

// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){



//START UPLOAD  SECTION
// *****************************************************************************
// *****************************************************************************
//                                                                            ** 

// Upload  Form--------------------------------------------------
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'file')->fileInput()->label('Select file') ?>
<button>Submit</button>
<?php ActiveForm::end();
//END  UPLOAD  FORM-----------------------------------------------






//Flash fires  if  SAVE--------------

//FLASh-Picture
 if (Yii::$app->session->hasFlash('gallery_SAVED') ) {
echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/auth.jpg' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] );
}

// Flash  text
 echo "</br>";
    echo Yii::$app->session->getFlash('gallery_SAVED'); 
      echo "</br>";
    echo Yii::$app->session->getFlash('gallery_DB_SAVED'); 
//END Flash fires  if  SAVE------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// End  Upload  Section




echo "</br></br><hr></br>";
//echo  Html::encode('User Gallery');
//echo "</br><hr>";





//  Starting  displaying  User's  Gallery 
// ***************************************************************************
// ***************************************************************************
//                                                                          ** 
if(!Yii::$app->user->isGuest){ echo "<h2>Active  Record</h2>";
//Start  Active  Record
      foreach ($activeRec  as $gall)  
          {
              echo $gall->g_user;      
              echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/'.$gall->g_image , $options = ["margin-left"=>"150px","class"=>"","width"=>"140px",] );
              // echo "</br>"; 
          } //end  foreach
//End  Active  Records  




echo "<hr>";





//Start ListView----------------------------------
echo "<h2>List View</h2>";
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_listview_gallery_1_view',
]);
//End  ListView----------------------------------






                       } // END if !Guest



// **                                                                    **
// ************************************************************************
// ************************************************************************
// End  dispalying  USer's Gallery 


echo "<hr>";




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
           echo' <div  style="border:solid black 1px;padding:3%;display:inline-block">';
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


