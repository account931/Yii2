<?php

use yii\helpers\Html;

////  Edit  Form  for MyDBStart  GridView  (uses _form.php as  a  partly  rendered)


/* @var $this yii\web\View */
/* @var $model app\models\Mydbstart */

$this->title = 'Update Mydbstart: ' . $model->mydb_id;
$this->params['breadcrumbs'][] = ['label' => 'Mydbstarts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mydb_id, 'url' => ['view', 'id' => $model->mydb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mydbstart-update">

    <h1>
<?= Html::encode($this->title); echo"</br>";  ?>
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/serverd.png' , $options = ["margin-right"=>"20px","class"=>" ","width"=>"7% ",] ); ?>
</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
