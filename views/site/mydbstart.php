<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;// NOT MANDATORY
use yii\widgets\DetailView;
use yii\widgets\Pjax;// delete


use yii\bootstrap\Tabs;
use yii\bootstrap\Alert;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)

//use kartik\widgets\ActiveForm;



$this->title = 'Statistics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title); echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/sun.jpg' , $options = ["margin-left"=>"3%","class"=>"sunimg","width"=>"4%",] ); ?> <!--MINE Sun Image--></h1>

    <!--<p>
       You may modify the following file to customize its content:  
    </p>
    <code><?= __FILE__ ?></code>-->
   
    


</br></br>





<!---------------------- Start Bootstrap------------------->
<!--https://nix-tips.ru/yii2-vse-plyushki-twitter-bootstrap.html-->
<?php
$infoLink= Html::a( "more  info", ["/site/about", "period" => "",   ] /* $url = null*/, $options = ["title" => "more  info",] );  //can't  inject it  directly to  widget

echo Alert::widget([
    'options' => [
        'class' => 'alert-info'
    ],
    'body' => "Below  u  can   <b>Record  & View  Your Activity (geo & venues) </b> -->  <span style='font-size:0.7em;'>  $infoLink </span>   "
]);?>
<!------------------------END BootStrap---------------------->



</div>





<?php
//  Collapse (Hide/  show  options)
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
$line=__FILE__;

echo Collapse::widget([
    'items' => [
        [
            'label' => '+',
            'content' => "   <p><b>Gii:</b>  http://localhost/yii/basic_download/web/index.php?r=gii
                             </br>
                             <b>MyAdmin:</b>   http://localhost/phpmyadmin/
                             </br>
                             <b>Debagger:</b>  http://localhost/yii/basic_download/web/index.php?r=debug (&r=debug)
                             </br>
                             You may modify the following file to customize its content:  
                             </br>
                             <code>$line</code></p>     ",
            // to  be  this  block open  by  default   de  comment  the  following 
            /*'contentOptions' => [
                'class' => 'in'
            ]*/
        ],
      
        
    ]
]);

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Collapse (Hide/  show  options)

?>






</br>
<!--<p>http://localhost/yii/basic_download/web/index.php?r=gii</p> http://localhost/phpmyadmin/-->
</br>
</br>
<?php 
// Yii Image  Server
echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/serverd.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"33%",] ); ?>   

<!--REASSIGNED to YII IMG --   <img  src="http://www.diagram.hr/images/usluge/db-backup.png"/> -->
</br>
</br>



<!--DUBLICATE FLASH-->
<!-- It is  display:none;  because   we  need  it  just  to  get  $nn  with  content  to  use  it  later  in Bootsrtrapped  alert   window -->
<div class='' style="display:none;font-size:16px;color:black;border:0px solid  red;"><!--display: inline-block-->
 <?= Yii::$app->session->getFlash('savedItem');  $nn=Yii::$app->session->getFlash('savedItem') ?>
</div></br>
<!--  END  DUBLICATE  FLASH-->



<?php
// If  saved and  FLASH IS SET /  has  flash   show  Bootstarp    alert  window($nn  is  used)---------
if (Yii::$app->session->hasFlash('savedItem')){echo Alert::widget([
    'options' => [
        'class' => 'alert alert-success'
    ],
    'body' => "$nn"
]);}
//  End  If  saved FLASH IS SET /  has  flash and  has  falsh   show  Bootstarp    alert  window------
?>







<?php
// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){

?>


        

  <?php  
        //  http://www.bsourcecode.com/yiiframework2/yii2-0-activeform-input-fields/    Active  form  Fields

        $form = ActiveForm::begin([

        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'enableAjaxValidation' => true, // my ajax
        ],
    ]); ?>

         <?php  $d=date('j-M-D-Y'); ?> <!--getting  the  current  date-->
         <?= $form->field($model, 'mydb_date')->textInput(['value'=>$d] ) ?>

    <!--Ven-->
        <?= $form->field($model, 'mydb_v_am')->textInput(['autofocus' => true])   ?>
        <?= $form->field($model, 'mydb_v_h')->textInput() ?>
    <!--Geo-->
        <?= $form->field($model, 'mydb_g_am')->textInput() ?>
        <?= $form->field($model, 'mydb_g_h')->textInput() ?>

        

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Roll it', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>





<!---------------------------------------------------Setting  Flash------------------------------------------------>
<?php
 // Set Flash -this  will  appear  if  u  succesfully  save  the  form*
    /*foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }*/
  // END  Set Flash-
?>
<!---------------------------------------------------END   Setting  Flash---------------------------------------------->

 <?php 
//below  works, but  can  handle  only  1  flash
 //if (Yii::$app->session->hasFlash('DONE')) {echo "Saved";} ?>

<div style="font-size:18px;color:orange;border:0px solid  red;padding:17px 17px 17px 17px;display: inline-block">
 <?= Yii::$app->session->getFlash('savedItem'); $nn=Yii::$app->session->getFlash('savedItem') ?>
</div>
<!---------------------------------------------------END   Setting  Flash---------------------------------------------->

<hr class="vertical">
<span id="showData" style="pointer:cursor;">&#8615; show additional  data &#8615;</span>



<!-----------------------------------------------------------START  class="hidden_data"  ------------------------------------------>
<div id="hidden_data"  style="display:none;">





<!---------------_ACTIVE  RECORD-------------------> <!--Set-upped in Controller to show personal records  if  u're  Logged & all  last  records if  u  are  not-->

<h1>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/server_file.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] ); ?>
 Active Record <span style="font-size:14px;">(last  5)</span></h1>
<?php
foreach( $activeRec as $w) {

        echo  "</br><span style='color:red;'>".  $w->mydb_date ."</span>";
        if( $w->mydb_v_am!=Null){//if  Ven  data  exists
                            echo  "=> Venues: ".        $w->	mydb_v_am   ." per ".    $w->	mydb_v_h    ." hours = ".  $w->	mydb_v_pers  .";"    ;
                                }

        if( $w->mydb_g_am!=Null){////if  GEo data  exists
                            echo  " Geo: ".         $w->	mydb_g_am   ." per ".    $w->	mydb_g_h    ." hours = ".  $w->	mydb_g_pers    ; 
                                 }//end  $w->	mydb_g_am!=Null)

                           //echo activeRec->mydb_date;
                            }//end  foreach
?>
<!---------------END ACTIVE RECORD----------------->



<hr class="vertical">











<!---------------_DetailView------------------->
<h1>DetailView</h1>
<?php echo DetailView::widget([
    'model' => $detailview,
    'attributes' => [
        'mydb_v_am',                                           // title свойство (обычный текст)
        //'Description:html',                                // description свойство, как HTML
        

        [                                                  // name свойство зависимой модели owner
            'label' => 'V_Am',
            'value' => $model->mydb_v_am,            
            'contentOptions' => ['class' => 'bg-red'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],



        [                                                  // name свойство зависимой модели owner
            'label' => 'V_hours',
            'value' => $model->mydb_v_h,            
            'contentOptions' => ['class' => 'bg-red'],     // настройка HTML атрибутов для тега, соответсвующего value
            'captionOptions' => ['tooltip' => 'Tooltip'],  // настройка HTML атрибутов для тега, соответсвующего label
        ],




        //'created_at:datetime',                            // дата создания в формате datetime
    ],
]);
?>
<!---------------_DetailView------------------->

</div><!-----------------------------------------------------------END class="hidden_data"  ------------------------------------------>




<hr>






<?php /*php Pjax::begin(['id' => 'admin-crud-id', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'POST']])*/  ?>


<?php    \yii\widgets\Pjax::begin(); ?> <?php  //this is  AJAX TRIGGER; ?>


<!---------------_ListView------------------->

<h1>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/server_file.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] ); ?>
ListView</h1>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_listview_1_view',
]);
?>

<!---------------ListView------------------->






<hr>







<!---------------GridView------------------>

<h1>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/server_file.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] ); ?>
GridView <span style="font-size:12px;">(editable  area)</span></h1>


<?php
echo GridView::widget(['dataProvider' => $dataProviderGrid,
'columns' => [
         ['class' => 'yii\grid\SerialColumn'],  'mydb_id','mydb_user','mydb_date','mydb_v_am','mydb_v_h','mydb_v_pers','mydb_g_am','mydb_g_h','mydb_g_pers',

         [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Do it', 
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}',
        ],
    ],

]);


?>
<?php \yii\widgets\Pjax::end(); ?>
<!---------------END GridView------------------>



<hr>
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
           echo' <div  style="border:solid black 1px;padding:3%;display:inline-block">';
           echo Html::a( "LOG IN FIRST", ['/site/login', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
           echo '</div>'; 

           /*echo' <div  style="border:solid black 1px;padding:3%;display:inline-block">';
           echo Html::a( " Registration ", ['/site/registartion', 'period' => "",   ] , $options = ['title' => 'Registration section',] ); 
           echo '</div>'; */
         }

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END if  Person is  not  logged
?>
