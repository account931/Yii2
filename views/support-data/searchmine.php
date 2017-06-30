<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\SupportData */
?>
<div>
Hello Search
</div>







<h1>DataBase</h1>
<!----------------Start PageLinker--------------------------------->
<?php
// Start 
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 


   
     

   echo "<div class='accordion'>";
  foreach ($modelPageLinker as $model) {

    echo "<h4 style='cursor:pointer;'><img src='images/check.png' style='width:3%;cursor:pointer;'/> ".$model->sData_header." => </h4>";
    
    echo "<p style='border:solid black 1px;padding:11px;'>".$model->sData_text."</br></br></br></p>";
  

  }

echo "</div>";



// display LinkPager
echo LinkPager::widget([
    'pagination' => $pages,
]);
 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END  
?>

<script>
/* START Accordition for PageLinker*/

    $(".accordion p").hide();
    $(".accordion h4").click(function(){

                $(this).next("p").slideToggle(500)
               .siblings("p:visible").slideUp(1400);      
 });


//Hide any click outside
//$('div:not(.accordion)').click(function(){
 // $('.accordion p').slideUp(1400); /*.css('visibility','hidden');*/
//});

/*End of accordition for PageLinker*/
</script>
