<?php
//  Edit  Form  for ......................
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mydbstart-form">



    <?php $form = ActiveForm::begin(/*['method' => 'post']*/); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>


    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'change it', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


