<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */

$this->title = $model->mydb_id;
$this->params['breadcrumbs'][] = ['label' => 'Mydbstarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mydbstart-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mydb_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mydb_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mydb_id',
            'mydb_user',
            'mydb_date',
            'mydb_v_am',
            'mydb_v_h',
            'mydb_v_pers',
            'mydb_g_am',
            'mydb_g_h',
            'mydb_g_pers',
        ],
    ]) ?>

</div>

