<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mydbstart';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mydbstart-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mydbstart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mydb_id',
            'mydb_user',
            'mydb_date',
            'mydb_v_am',
            'mydb_v_h',
            // 'mydb_v_pers',
            // 'mydb_g_am',
            // 'mydb_g_h',
            // 'mydb_g_pers',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

