<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
    </br>

    <?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/about.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"27% ",] ); ?>




<h1>General Guidelines</h1>

<p>How  to use:</p>
<p>1.Print the  amount of daily proceeded Venues in cell "Venue  amount" & hours spent over this  task in cell "Venues hours" in menu section "DataBase"</p>
<p>2.Print the  amount of daily proceeded Geo in cell "Geo  amount" & hours in cell "Geo hours" (if  there is  any)</p>
<p>3.Press the  % button  to  get percentage rate  recorded  to SQL  DataBase</p>
<p>4.View/edit  your  statistics  in the  section below  the input  form</p>
<p>5.Any live calculation ,without recoring to DB can be done in menu section "Calc" </p>











</div>
