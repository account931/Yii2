<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */

$this->title = 'Create Mydbstart';
$this->params['breadcrumbs'][] = ['label' => 'Mydbstarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mydbstart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

