<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SupportData */

$this->title = 'Update Support Data: ' . $model->sData_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sData_id, 'url' => ['view', 'id' => $model->sData_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
