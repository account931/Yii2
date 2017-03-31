<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Your  Profile Info';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <h4>



<?php
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
// Start if  Person is  LOGGED
    if(!Yii::$app->user->isGuest){
                                  echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/auth.jpg' , $options = ["margin-left"=>"","class"=>" ","width"=>"9% ",] );
                                  echo"</br></br>Your name is=> ";echo '<span style="color:red;" >'.Yii::$app->user->identity->username.'</span>';
                                  echo"</br>Your Id   is=> ";     echo '<span style="color:red;" >'.Yii::$app->user->getId().'</span>';
                                  echo"</br>Your email is=> ";    echo '<span style="color:red;" >'.Yii::$app->user->identity->email.'</span>'; //  Unversal Path=change  last item  as  in DB;
                                  //convert UNIX SQL TimeStamp  to  Date  (For {created_at});
                                  $timestampD=Yii::$app->user->identity->created_at;   $date = date('d-m-Y',$timestampD );  $time = date("h:i:sa", $timestampD);
                                  echo"</br>Created at =>  UnixTime: ";  echo '<span style="color:red;" >'.$timestampD.'</span>' ;       echo " / Or normal  time:<span style='color:red;' > " .$date.' '.$time.'</span>'; 

                                  //convert UNIX SQL TimeStamp  to  Date  (For {updated  _at});
                                  $timestampD2=Yii::$app->user->identity->updated_at;   $date2 = date('d-m-Y',$timestampD );  $time2 = date("h:i:sa", $timestampD2);
                                  echo"</br>Updated at=>  UnixTime: ";  echo '<span style="color:red;" >'.$timestampD2.'</span>' ;       echo " / Or normal  time:<span style='color:red;' > " .$date2.' '.$time2.'</span>'; 

                                   echo"</br>Auth Key is => ";    echo '<span style="color:red;" >'.Yii::$app->user->identity->auth_key .'</span>';
                                   echo"</br>Status  is => ";    echo '<span style="color:red;" >'.Yii::$app->user->identity->status .'</span>';
                                   echo"</br>Language  is => ";    echo '<span style="color:red;" >'.Yii::$app->user->identity->language .'</span>';
                                   echo"</br>Role  is => ";    if ( strcmp ( Yii::$app->user->identity->role, 2) == 0  ){
                                                                                                  echo '<span style="color:red;" >Admin</span>';
                                                                                                                        }
                                                                                                                         else{echo '<span style="color:red;" >User</span>';}
                                   echo "</br></br>";


//Yii Link (form  the  <a href>  to edit  Profile =controller/action + current record  id)
 echo Html::a( "<img src='images/pencil.png'/>yii-edit", ['site/editprofile', 'idE' => Yii::$app->user->getId(), /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'Your  edit Link',] ); 

                   
                                  } 
// END  if  Person is  LOGGED
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  





// **************************************************************************************
// **************************************************************************************
//                                                                                     **
// Start if  Person is  not  logged
    else { echo "<h4>So far, You are  Not  Logged</h4></br>";
           echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/stop.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] );
           echo' </br></br><div  style="border:solid black 1px;padding:3%;display:inline-block">';
            echo Html::a( "LOG IN FIRST", ['/site/login', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
            echo '</div>'; 
         } 
// END if  Person is  not  logged
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  
?>

</br></br></br>






</h4>  
</div>


