<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SupportData */

$this->title = 'Create Support Data';
$this->params['breadcrumbs'][] = ['label' => 'Support Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
