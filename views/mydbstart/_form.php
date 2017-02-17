<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mydbstart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mydb_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mydb_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mydb_v_am')->textInput() ?>

    <?= $form->field($model, 'mydb_v_h')->textInput() ?>

    <?= $form->field($model, 'mydb_v_pers')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mydb_g_am')->textInput() ?>

    <?= $form->field($model, 'mydb_g_h')->textInput() ?>

    <?= $form->field($model, 'mydb_g_pers')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

