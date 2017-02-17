<?php
//used  for  1  item  view  in ListView  Gallery
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>



<div class="post">
    <span style="color:red;"><?= Html::encode($model->g_date) ?></span>

   
    <?= HtmlPurifier::process('uploaded  by =>  '.$model->g_user ) ;  ?>
    <?= HtmlPurifier::process($model->g_ip);  ?>
    <?= Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/'.$model->g_image , $options = ["margin-left"=>"","class"=>"","width"=>"80px",] );    ?>
    <?= Html::a( "delete", ['/site/delettte', 'id' =>$model->g_id, ] , $options = ['title' => 'delete  me',] );  ?>


</div>


