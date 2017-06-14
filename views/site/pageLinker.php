<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;

$this->title = 'Page  Linker';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<h1><?= Html::encode($this->title); ?> </h1>  
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/pagelinker.jpg' , $options = ["margin-left"=>"0%","class"=>"sunimg","width"=>"24%",] ); ?> <!--MINE Sun Image-->

</br></br></br></br>


<?php
echo "Controller ->         <span style ='color:red;'>" .Yii::$app->controller->id;
echo "</span></br>Action -> <span style ='color:red;'>" .Yii::$app->controller->action->id;
echo "</span></br>Module -> <span style ='color:red;'>" .Yii::$app->controller->module->id;
echo "</span></br></br>";
?>





<?php
// Start 
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 


Pjax::begin(); 

foreach ($models as $model) {


    // display  some  data
    echo "<p style='border:0.1px  dotted  black;'>";
    echo $model->mydb_date;
    echo "</p>";

}

Pjax::end(); 


// display LinkPager
echo LinkPager::widget([
    'pagination' => $pages,
]);
 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END 
?>


