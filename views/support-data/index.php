<?php

//
//Support CR's knowledge base



use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

use yii\bootstrap\Alert;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)
use yii\widgets\ActiveForm;


// Do diable must have login kill   // Start if  Person is  LOGGED-------  End if  Person is  LOGGED

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupportDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

/* @var $model app\models\SupportData */

$this->title = 'Support DataBase';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
   <!--<span style="font-size:1.em;">  (frequently used issues)</span>--></br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Support Data', [''], ['class' => 'btn btn-success']) ?>
        <?php // echo Html::a('Create Support Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>













<!---------------------Start BootStrap Alert---------------------->

<!--https://nix-tips.ru/yii2-vse-plyushki-twitter-bootstrap.html-->
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-success'
    ],
    'body' => 'Below  u  can   <b>Record  & View  Your Knowledge DataBase </b>'
]);?>
<!------------------------END BootStrap Alert---------------------->




<!--</div>-->





<?php
//  Collapse Bootstrap Widget  (Hide/  show  options)
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
$line=__FILE__;
echo Collapse::widget([
    'items' => [
        [
            'label' => '+',
            'content' => "   <p>http://localhost/yii/basic_download/web/index.php?r=gii</br> http://localhost/phpmyadmin/
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
<!---------->










</br></br></br>






<!------- Start Container Trigger to make Form to add item visible + Serach------>
<div class="row">
  <div class="col-sm-6">



			<?php 
             echo "</br></br>";
			 echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/plus.png' , $options =["id"=>"sx","marginleft"=>"3%","class"=>"sunimg","width"=>"9%","alt"=>"click","title"=>"click to add a  new  one"] );
			 echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/addarrow.gif' , $options = ["id"=>"sx","margin-left"=>"3%","class"=>"sunimg","width"=>"12%","title"=>"click to add a  new  one"] ); ?>

			<span id="sx" style="cursor:pointer;"><?= Html::encode("Add an issue") ?></span>

 </div>

 <!-------Start search------>
 <div class="col-sm-4">
             <h3>Search your issue</h3>
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($searchMine, 'q')->textInput(['class' => 'input']) ?>
            <?= Html::submitButton('Search', ['class' =>  'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>
 </div>
 <!-------END search------>

</div><!------ Start container Trigger for Form to add+ search------>




 
<!---------flash------------>
</br>
<div style="font-size:18px;color:orange;border:0px solid  red;padding:17px 17px 17px 17px;display: inline-block"><!--Dublicate-->
 <?php /*=*/ $nn=Yii::$app->session->getFlash('savedItemZ');  ?>
</div>


<?php
echo"</br>";
if (Yii::$app->session->hasFlash('savedItemZ')){echo Alert::widget([
    'options' => [
        'class' => 'alert alert-info'
    ],
    'body' => "$nn"
]);}
//  End  If  saved FLASH IS SET /  has  flash and  has  falsh   show  Bootstarp    alert  window------
?>

<!----------END flash--------------------->




<!-------------------------Form-------------------------------------->
<div id="formS" style="display:none; background:;padding:30px;"  class=' btn-success';> <!--Bootstrap inject  btn-->
<h1>Submit a new issue </h1>

     <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div><!--id="formS">-->
<!-------------END Form------>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
// Start  show/hide  add item panel
    $("#sx,#cancel").click(function(){
    $("#formS").toggle(1200);
    });

//  End  show/hide
</script>
<!-------------------------End Form-------------------------------------->




</br></br>
<hr style="color:grey;height:3px;">
</br>







<?php
// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){
	// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
?>





<h1>DataBase</h1>
<!----------------Start PageLinker--------------------------------->
<?php
// Start 
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 

Pjax::begin(); 

echo "<div class='accordion'>";
  foreach ($modelPageLinker as $model) {

    echo "<h4 style='cursor:pointer;'><img src='images/check.png' style='width:3%;cursor:pointer;'/> ".$model->sData_header." => </h4>";
    
    echo "<p style='border:solid black 1px;padding:11px;'>".$model->sData_text."</br></br></br></p>";
  

  }

echo "</div>";
Pjax::end(); 


// display LinkPager
echo LinkPager::widget([
    'pagination' => $pages,
]);
 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END  
?>


<script>
/* START Accordition for PageLinker*/

    $(".accordion p").hide();
    $(".accordion h4").click(function(){

                $(this).next("p").slideToggle(500)
               .siblings("p:visible").slideUp(1400);      
 });


//Hide any click outside
//$('div:not(.accordion)').click(function(){
 // $('.accordion p').slideUp(1400); /*.css('visibility','hidden');*/
//});

/*End of accordition for PageLinker*/
</script>


<!-------------------------End PageLinker------------------------------->












</br></br></br></br>
<hr style="color:grey;height:4px;">
</br></br>





<!---------------------------GridView---------------->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sData_id',
            'sData_user',
            'sData_ip',
            'sData_date',
            'sData_header:ntext',
            // 'sData_text',
            // 'sData_category',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<!------------------------END GridView------------------>












<?php  
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
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















</div>

