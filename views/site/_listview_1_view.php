<?php

//used  for  1  item  view  in ListView (in MyDBStart)

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="post">
    <h5 style="color:red;"><?= Html::encode($model->mydb_date) ?></h5>

<!-- Ven-->
<?php if (!empty($model->mydb_v_am)) { ?>

    <?= HtmlPurifier::process($model->mydb_v_am ." venues per  ") ;  ?>
    <?= HtmlPurifier::process($model->mydb_v_h ." hours")  ?>
    <?= HtmlPurifier::process(" = ".$model->mydb_v_pers )  ?>
    <?= HtmlPurifier::process("; ") ;  ?>
<?php } ?>


<?php if (!empty($model->mydb_g_am)) { ?>
<!-- Geo -->
 
 <?= HtmlPurifier::process($model->mydb_g_am ." geo  per  ") ;  ?>
 <?= HtmlPurifier::process($model->mydb_g_h ." hours")  ?>
 <?= HtmlPurifier::process(" = ".$model->mydb_g_pers )  ?>
 <?php                                } /* END if (!empty($model->mydb_g_am))*/  ?>

<hr  style="color:red;width:70%;">
</div> 


