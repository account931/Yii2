<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */

$this->title = 'Update Mydbstart: ' . $model->mydb_id;
$this->params['breadcrumbs'][] = ['label' => 'Mydbstarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mydb_id, 'url' => ['view', 'id' => $model->mydb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mydbstart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

