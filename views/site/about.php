<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Collapse;  //  Collapse (hide/show)

use yii\helpers\Url;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>




<?php
//  Collapse (Hide/  show  options)
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
$line=__FILE__;

echo Collapse::widget([
    'items' => [
        [
            'label' => '+',
            'content' => "   
							<p>
								This is the About page. You may modify the following file to customize its content:
							</p>

							<code>$line </code>    
                            ",
            // to  be  this  block open  by  default   de  comment  the  following 
            /*'contentOptions' => [
                'class' => 'in'
            ]*/
        ],
      
        
    ]
]);

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  Collapse (Hide/  show  options)

?>





   <!-- <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
    </br>-->

    <?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/about.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"27% ",] ); ?>




<h1>General Guidelines</h1>

<p>How  to use:</p>
<p>1.Print the  amount of daily proceeded Venues in cell "Venue  amount" & hours spent over this  task in cell "Venues hours" in menu section "DataBase"</p>
<p>2.Print the  amount of daily proceeded Geo in cell "Geo  amount" & hours in cell "Geo hours" (if  there is  any)</p>
<p>3.Press the  % button  to  get percentage rate  recorded  to SQL  DataBase</p>
<p>4.View/edit  your  statistics  in the  section below  the input  form</p>
<p>5.Any live calculation ,without recoring to DB can be done in menu section "Calc" </p>




</br>
<h1>Section Guidelines</h1>

<p>1.Reg- registration</p>
<p>2.Calc- statistic  calculation</p>
<p>3.Split- split your  coordinates  set</p>
<p>4.Summary- view month performance, general  amount , hours, persentage</p>
<p>5.Geo-automatic coordinates  find  tool</p>
<p>6.Re-route- quick  navigation  from  Waze to  Google  Maps  and  back</p>
<p>7.Sort - find  coherent  lines</p>
<p>8.My Time- autofill  your  form</p>
<p>9.MyStats - record  &  view  your  statistics by  days </p>


<?php  echo Html::a( "Back  to  Stats", ["/site/mydbstart", "period" => "",   ] /* $url = null*/, $options = ["title" => "back  to  stats",] ); ?>

</br><a  href= <?php /*Yii::$app->urlManager->createUrl([‘site/login’, ‘id’ => ‘about’]);*/?>  >UrlManager</a></br>

<?php echo Html::a( "Traditional"    , ['/site/login', 'period' => "current", /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'Login',] );  ?>


</div>
