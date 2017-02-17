<?php

//used  for  1  item  view  in ListView

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h5 style="color:red;"><?= Html::encode($model->mydb_date) ?></h5>
<!-- Ven-->
    <?= HtmlPurifier::process($model->mydb_v_am ." v per  ") ;  ?>
    <?= HtmlPurifier::process($model->mydb_v_h ." hours")  ?>
    <?= HtmlPurifier::process(" = ".$model->mydb_v_pers ." ---------- ")  ?>

<?php if (!empty($model->mydb_g_am)) { ?>
<!-- Geo -->
 <?= HtmlPurifier::process($model->mydb_g_am ." g  per  ") ;  ?>
 <?= HtmlPurifier::process($model->mydb_g_h ." hours")  ?>
 <?= HtmlPurifier::process(" = ".$model->mydb_g_pers )  ?>
</div>

<?php } /* END if (!empty($model->mydb_g_am))*/  ?>
