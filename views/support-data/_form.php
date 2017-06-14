<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SupportData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'sData_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sData_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sData_date')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'sData_header')->textarea(['rows' => 3]) ?> 


    <?= $form->field($model, 'sData_text')->textarea(['rows' => 6]) ?> 

   <!-- <?= $form->field($model, 'sData_category')->textInput() ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
