<?php
//Classes  used  to  implement  this  part
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Administrative  page';  //  the  title  of  the  page
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<img  src='http://3.bp.blogspot.com/-XtM8L-aDwhU/VJGPzsjjeKI/AAAAAAAAAzQ/DQhzQtqddT0/s1600/Admin%2Brights.png'/>








<?php 
//START  if LOGGED  & Admin (i.e  role=2);
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
if(!Yii::$app->user->isGuest){
   if ( strcmp ( Yii::$app->user->identity->role, 2) == 0  )
 {
  echo '<p style="color:red;" > You have Admin access</p>';

//
?>
<!---------------GridView------------------>

<h1>

<?php    \yii\widgets\Pjax::begin(); ?>
<?php 
echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/server_file.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"7% ",] ); ?>
GridView</h1>


<?php
echo GridView::widget(['dataProvider' => $dataProviderGrid,
'columns' => [
         ['class' => 'yii\grid\SerialColumn'],  'mydb_id','mydb_user','mydb_date','mydb_v_am','mydb_v_h','mydb_v_pers','mydb_g_am','mydb_g_h','mydb_g_pers',

         [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Do it', 
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}',
        ],
    ],

]);
?>


<?php yii\widgets\Pjax::end(); 
//<!---------------END GridView------------------>
//  <!--  END  GridView-->



  } //END  if ( strcmp ( Yii::$app->user=ADMIN

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  if LOGGED  & Admin or  Just  a  User


    //if  LOGGED  but  not  admin //  without it  has  no  display  for  a  User  with  custom  rights(i.e  role=1;)()based  on SQL  field )
          else{echo '<p style="color:red;" > You are logged  but You have NO Admin access</p>';}//  LAst







// START FOR GUESTS (who  is  not  logged );
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
}else{
       echo '<p style="color:red;" > You have NO Admin access</p>';
       }
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END for  GUESTS(who is not logged);
?>
</div>
