<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)


$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <?php 
  echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/sun.jpg' , $options = ["class"=>"sunimg","width"=>"2%"]); ?> <!--MINE Sun Image-->
    <h1><?= Html::encode($this->title) ?>    <img src="http://www.brightkidsbooks.com/wp-content/uploads/2014/05/sun-logo-300x300.jpg" style="width:4%;margin-left:2%;"/>  </h1>






<?php if(Yii::$app->user->isGuest){  //visible  only  for  unlogged  Guests 122.22  ?>
    <p>Please fill out the following fields to login:</p>

<?php
//  Collapse (Hide/  show  options)
// ******************************************************
// ******************************************************
//                                                     **
echo Collapse::widget([
    'items' => [
        [
            'label' => '-',
            'content' => '   
                        <div class="col-lg-offset-1" style="color:#999;">
                       You may login with <strong>d****/d***(x2)(double)</strong>.<br>
                       FOR THE REASON TEXT ARRAY USERS are  reassigned  to SQL  DB ,you may NO LONGER login with <strong>admin/admin</strong> <br>
                       To modify the username/password, please check out the code <code>app\models\User::$users</code>(only for  case using  TEXT USERS ARRAY).
                       Not  fits SQL (which is  now  enabled)
                       </div>   ',
            // to  be  this  block open  by  default   de  comment  the  following 
            /*'contentOptions' => [
                'class' => 'in'
            ]*/
             

               
        ],
      
        
    ]
]);

// **                                                          **
// **************************************************************
// **************************************************************
// END  Collapse (Hide/  show  options

// echo Html::a( "Not  registered?", ['/site/registartion', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Resistration',] ); 
?>

<?php }
////visible  only  for  unlogged  Guests 122.22 
 ?>














<!-- FLASh-Picture-->
<?php 
//  FLASH  that is  visible  if  the  person is  logged
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
if (Yii::$app->session->hasFlash('logged')) {
echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/auth.jpg' , $options = ["margin-left"=>"","class"=>" ","width"=>"17% ",] );

} ?>

<!-- FLASh(works  as well along  with the  first flash)-->
</br><div style="font-size:18px;color:orange;border:0px solid  red;padding:17px 17px 17px 17px;display: inline-block">
 <?= Yii::$app->session->getFlash('logged'); 


if (Yii::$app->session->hasFlash('logged')) {
echo "</br></br>";
echo Html::a( "Go to  your  page =>", ['/site/mydbstart', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
}


// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END FLASH  that is  visible  if  the  person is  logged
?>
</div>





<?php 
// Start if  Person is  GUEST-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
// REMOVE   Login Form part  after  successfull login(after LOGIN u' won't  see  it)-//visible  only  for  unlogged  Guests
if(Yii::$app->user->isGuest){    ?>




    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); 

echo "</br>";
echo Html::a( "Not  registered?", ['/site/registartion', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Resistration',] );

?>




















   <!-- <div class="col-lg-offset-1" style="color:#999;">
    You may login with <strong>dima/d***(x2)(double)</strong>.<br>
        FOR THE REASON TEXT ARRAY USERS are  reassigned  to SQL  DB you may NO LONGER login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>(only for  case using  TEXT USERS ARRAY).Not  fits SQL (which is  now  enabled)
    </div>-->

<?php 
 }  // END if(Yii::$app->user->isGuest)   // REMOVE   Login Form part  after  successfull login

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END Start if  Person is  GUEST
?>


</div>
