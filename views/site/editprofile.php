<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'MyProfile_Edit: ' . $model->id;
//BreadCrumbs
$this->params['breadcrumbs'][] = ['label' => 'MyProfile_Edit', 'url' => ['mypage']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mydbstart-update">

    <h1>
<?= Html::encode($this->title); echo"</br>";  ?>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/auth.jpg' , $options = ["margin-right"=>"20px","class"=>" ","width"=>"7% ",] ); ?>
</h1>

    <?= $this->render('_formEditProfile', [
        'model' => $model,
    ]) ?>

</div>
