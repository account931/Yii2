<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Time';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<h1><?= Html::encode($this->title); ?> </h1>  





<?php
// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){
?>



<!------------------------- Loading  frame  like  window------------------------------->
<div id="testLoad"  style="width:99%;height:900px;"></div> <!--  absolute  is  put  to  ensure  full,  page position:absolute; top:200px;left:30px; -->
<script>
        $("#testLoad").html('<object style ="width:98%;height:200%;" data=" http://example2.esy.es/myWazeTime/cut_release.php?user= "/>');
</script>
<!-------------------------ENd  loading  frame  like  window---------------------------->


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


