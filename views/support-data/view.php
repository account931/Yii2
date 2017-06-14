<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SupportData */

$this->title = $model->sData_id;
$this->params['breadcrumbs'][] = ['label' => 'Support Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sData_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sData_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sData_id',
            'sData_user',
            'sData_ip',
            'sData_date',
            'sData_header:ntext',
            'sData_text',
            'sData_category',
        ],
    ]) ?>

</div>
