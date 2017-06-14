<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupportDataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sData_id') ?>

    <?= $form->field($model, 'sData_user') ?>

    <?= $form->field($model, 'sData_ip') ?>

    <?= $form->field($model, 'sData_date') ?>

    <?= $form->field($model, 'sData_header') ?>

    <?php // echo $form->field($model, 'sData_text') ?>

    <?php // echo $form->field($model, 'sData_category') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
