<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Alert;
use yii\bootstrap\Collapse; 

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


<?= Html::encode($this->title); 
echo "</br>";
echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/r2.png' , $options = ["margin-left"=>"3%","class"=>"sunimg","width"=>"12%",] ); ?>




    <?php 
// **************************************************************************************
// **************************************************************************************
//                                                                                     **  
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'supp_id',
            'supp_user',
            'supp_date',
            'supp_ip',
            'supp_amount',
            // 'supp_hour',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************


//my  hyperlink
 echo Html::a( "Add new", ['/supp/create', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'add',] ); 
           //echo '</div>'; 















//--------------------------------------------------------------------------------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 

//<!---------------------- Start Bootstrap------------------->
//<!--https://nix-tips.ru/yii2-vse-plyushki-twitter-bootstrap.html-->

$infoLink= Html::a( "more  info", ["/site/about", "period" => "",   ] /* $url = null*/, $options = ["title" => "more  info",] );  //can't  inject it  directly to  widget

echo Alert::widget([
    'options' => [
        'class' => 'alert-info'
    ],
    'body' => "Below  u  can   <b>Record New  Activity </b> -->  <span style='font-size:0.7em;'>  $infoLink </span>   "
]);
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
?>
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


   echo '</div>';
?>






















