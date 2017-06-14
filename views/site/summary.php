<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;

//use yii\widgets\ListView;
//use yii\grid\GridView;
//use yii\data\ActiveDataProvider;// NOT MANDATORY
//use yii\widgets\DetailView;
//use yii\widgets\Pjax;// delete



$this->title = 'Summary ';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="site-about">
  <h1><?= Html::encode($this->title); ?> </h1>  
  <!--<h5>view your month performance (hours spent of tasks, quantity of  geo/venues  done,percentage performance) </h5>-->



<!---------------------- Start Bootstrap------------------->
<!--https://nix-tips.ru/yii2-vse-plyushki-twitter-bootstrap.html-->
<?php
echo Alert::widget([
    'options' => [
        'class' => 'alert-info'
    ],
    'body' => 'Below  u  can  view <b> your month performance </b>(hours spent of tasks, quantity of  geo/venues  done,percentage performance '
]);?>
<!------------------------END BootStrap---------------------->






<!---------------Summary------------------->  <!--Set-upped in Controller to show personal records  if  u're  Logged & all  last  records if  u  are  not--->

<h1> 
<?php echo Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/images/month.png' , $options = ["margin-left"=>"","class"=>" ","width"=>"27% ",] ); ?>
<!--</br> Your  activity <span style="font-size:14px;">month details</span>--></h1>





<?php
// Start if  Person is  LOGGED-------
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    if(!Yii::$app->user->isGuest){

      // START  ALL TIME RESULT  (so  far it  uses  date  selection)
                      //getting  your  month  activity
                        $month_v_am=0; //all ven_amount
                        $month_v_h=0;  //all ven_hours;
                        $month_g_am=0; //all ven_amount
                        $month_g_h=0;  //all ven_hours;

                      //calculate all your inputs
                        foreach( $summary as $w) {  $month_v_am=$month_v_am + $w->mydb_v_am;    $month_v_h=$month_v_h + $w->mydb_v_h;
                                                    $month_g_am=$month_g_am + $w->mydb_g_am;    $month_g_h=$month_g_h + $w->mydb_g_h;
                                                 }

                      //foreach( $summary as $w) {echo  "</br>".  $w->mydb_date    ." -> ".        $w->	mydb_v_am   ." -> ".    $w->	mydb_v_h    ." = ".  $w->	mydb_v_pers    ; }
                     // END  getting  your  month  actvity

                     

                    echo' <div id="summaryAll:"  style="border:solid black 1px;padding:3%;display:inline-block"><h3>All results</h3>';
                    //echo "<table><tr><td> All Ven_amount:</td><td style='color:red;'>".$month_v_am ."</td>  ";//abortive  table
                    //echo "<td> All Ven_hours:</td><td style='color:red;'>".$month_v_h ."</td></tr>  "; 
                    echo "<p>  All Ven_amount=  <span style='color:red;'> ".$month_v_am ."; </span>";
                    echo "   All Ven_hours=  <span style='color:red;'> ".$month_v_h ." ;</span></p>";
                    echo "<p>All Geo_amount= <span style='color:red;'>".$month_g_am ." ;</span>";
                    echo "   All Geo_hours=  <span style='color:red;'> ".$month_g_h ." ;</span></p>";
                    //echo "Average V/G % =";
                    echo "</br> All  spent hours : ".($month_v_h+$month_g_h);
                    //echo "</table>";
                    echo "</div></br> ";
    //  END  ALL TIME  RESULTS


                      //JUST  TO  test,  delete  later
                         /*echo "<div>";
                         foreach ($current  as $wCurrent) { echo  "</br>" .$wCurrent->mydb_date."</br>";}
                         echo "</div></br>";*/
                      //END JUST  TO  test,  delete  later






//Yii Link  to  view  only  current month results(visible unless clicked)  ----------------------------------------------------------------
 //was  done  via a**,  so  it  a  bit ragul, u  should  not  have  used {if (!=="current")} , but {if (=="current")}, i.e  for  every  case, as  in  future  u  would  not  be  able  to  extend  these  links  for  othe r cases  (i.e month-2, -3, etc)
if (Yii::$app->getRequest()->getQueryParam('period')!=="current") //Make Link  invisible  when click  it(if $_GET['period']=="current")
    {echo Html::a( "view current month ( "  .date('M-Y').   ")"    , ['/site/summary', 'period' => "current", /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'View Current  Month',] ); 
    } //???=>   SOLVED

//-----------------------------------
if (Yii::$app->getRequest()->getQueryParam('period')=="previous")
{
echo "</br>";
echo Html::a( "back", ['/site/summary', 'period' => "", /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'View Current  Month',] );
}
//----------------------


else if(Yii::$app->getRequest()->getQueryParam('period')!=null) //  not  to  display "back"  at start page 
    {echo Html::a( "back", ['/site/summary', 'period' => "", /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'View Current  Month',] );   }
        echo "</br>"; 

    //Yii Link  to  view  only   month-1 results(visible unless clicked)  
if (Yii::$app->getRequest()->getQueryParam('period')!=="previous") //Make Link  invisible  when click  it(if $_GET['period']=="previous")
    {echo Html::a( " view previous month ( ".      date('M-Y', strtotime(date('Y-m')." -1 month"))   .")"     , ['/site/summary', 'period' => "previous", /* 'get2' => 'name'*/  ] /* $url = null*/, $options = ['title' => 'View Previous  Month',] ); }                                                   

//END Yii Link  to  view  only  current month results(visible unless clicked)-------------------------------------------------- 









// ***************************************
// ***************************************
//                                      ** 
       // Display CURRENT  month  results  ONLY (implement  in Controller )-------------------
           $period=Yii::$app->getRequest()->getQueryParam('period'); //  getting  the  $_GET['param']
           if ($period=='current')
              {           $currentMonth=date('M-Y');
                     //
                          $todayMonth=date('m'); $todayYear=date('Y');   
                          $days_in_this_month=cal_days_in_month(CAL_GREGORIAN,$todayMonth,$todayYear);//  days in this  month
                     //
                    echo" </br></br><div  style='border:solid black 1px;padding:3%;'><h3>Current  Month Results (  $currentMonth ,    $days_in_this_month days )  </h3>";
                              $current_v_am=0; //Only  current ven_amount (var  to  sum  all)
                              $current_v_h=0;  //Only  current ven_hours;
                              $current_g_am=0; //Only  current g_amount
                              $current_g_h=0;  //Only  current g_hours;
                              $current_v_persentage=0;  // all currenet v month  persentage  sum
                              $current_g_persentage=0;  // all currenet g  month  persentage  sum
                              $curr_v_per_count=0;    // used  for ven (NOT NULL entries) count++(it is  used  to calculate  average  current  month % (i.e(sum of ven%/quantity of  redords)))
                              $curr_g_per_count=0;    //used  for ven (NOT NULL entries) count++

                                foreach ($current  as $wC2)   
                              {
       //  echo  "</br>" .$wC2->mydb_date."</br>";  //Working  days  -erase later  just  to  test  dates;-located  bellow
         //echo "<p> End </p>";

                                $current_v_am= $current_v_am + $wC2->	mydb_v_am;  $current_v_h+=  $wC2->	mydb_v_h;   // calc  this  month Ven  amount  and  hours
                                $current_g_am= $current_g_am + $wC2->	mydb_g_am;  $current_g_h+=  $wC2->	mydb_g_h;   // calc  this  month  G  amount  and  hours 
                                $current_v_persentage= $current_v_persentage+  substr($wC2->	mydb_v_pers , 0, -1);   // calculate  all  Ven % (trim last  element "%")
                                $current_g_persentage= $current_g_persentage+  substr($wC2->	mydb_g_pers , 0, -1);  // calculate  all  Ven % (trim last  element "%")
                                if($wC2->	mydb_v_pers!=null){$curr_v_per_count=$curr_v_per_count+1;} //number of  Ven perc  entries(NOT NULL)(used  to  calculate current  average %)
                                if($wC2->	mydb_g_pers!=null){$curr_g_per_count=$curr_g_per_count+1;} //number of  G perc  entries(NOT NULL)
                              } //  END  FOREACH??????+++

                               echo "</br><p>Month  ven_amount= <span style='color:red;'>".$current_v_am ."</span></p>"; // Ven  this  month all  amount
                               echo "<p>Month  ven_hours=  <span style='color:red;'> ".$current_v_h ."</span></p>"; // Ven  this  month all  hours
                               echo "<p>Month  geo_amount= <span style='color:red;'>".$current_g_am ."</span></p>";
                               echo "<p>Month  geo_hours=  <span style='color:red;'> ".$current_g_h ."</span></p>";

     //if  no   If condition & no  Ven  Value=it  crashes
 if(/*$wC2->	mydb_v_pers*/$current_v_persentage!=null){echo "<p>This  Month Ven  average % =  <span style='color:red;'> ".$current_v_persentage/$curr_v_per_count ."</span></   p>"; }
  else{echo "<p>This  Month Ven  average % =  <span style='color:red;'> Zero</span></p>";} // Calc  current  average  V % (sum of  V_perc/quantity of  records);


//if  no   If condition & no  Geo Value=it  crashes
if(/*$wC2->	mydb_g_pers*/$current_g_persentage!=null){echo "<p>This  Month Geo  average % =  <span style='color:red;'> ".$current_g_persentage/$curr_g_per_count ."</span></p>";}
   else{echo "<p>This  Month Geo  average % =  <span style='color:red;'> Zero</span></p>";} 

                               echo "<p>V count = ".$curr_v_per_count. ";  G count = " .$curr_g_per_count ."</p>";
                                   $all_hours=$current_v_h + $current_g_h;// all this  month  V +G hours (for  some  bizzare  reason can't + it  in  folowwing  echo)
                               echo "<p>This  month all hours=  <span style='color:red;'> ".$all_hours  ."</span></p>"; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


              //Start  all  working  days 
                         echo "</br></br><h3 style=''color:red;'>This  month's  days u  worked </h3>";
                        foreach ($current  as $wC2)   
                              { echo  "</br>" .$wC2->mydb_date."</br>";} 
              //  End  all  working  days

                                                        
                    echo "</div> ";
              } // END  if ($period=='current')
      // END  Display CURRENT  month  results  ONLY ------------------------------------------

//                                **
// *********************************
// *********************************













// ********************************
// ********************************
//                               **
              // Display Prev month  results  ONLY (implement  in Controller )---------------------------------
              $period2=Yii::$app->getRequest()->getQueryParam('period');  //  getting  the  $_GET['param']
              if ($period2=='previous') {
                 //erase
                      $PrevMonth=date('M', strtotime(date('Y-m')." -1 month"));          $PrevYear=date('Y', strtotime(date('Y-m')." -1 month")); 
//--------------------------
                       $PrevMonth2=date('m', strtotime(date('Y-m')." -1 month"));  //getting  prev  month (i.e 1-12);
                        $days_in_prev_month=cal_days_in_month(CAL_GREGORIAN,$PrevMonth2,$PrevYear);//  number of days in prev month;
//-----------------------------------
                      //echo $PrevMonth;  echo " - ". $PrevYear;//confirm  delete, it  was  just  for  echoing;?
                  //end  erase
                     echo" </br></br><div  style='border:solid black 1px;padding:3%;'><h3>Prev  Month Results (  $PrevMonth -$PrevYear , $days_in_prev_month days  )  </h3>";
                         //foreach ($modelX  as $b)  { echo  "</br>" .$b->mydb_date."</br>";} // end  Foreach  //tempoary disabled




//start inject(copied  from  Current  month-juast  changed in  foreach(X!!!  as))-----
 $current_v_am=0; //Only  current ven_amount
                              $current_v_h=0;  //Only  current ven_hours;
                              $current_g_am=0; //Only  current g_amount
                              $current_g_h=0;  //Only  current g_hours;
                              $current_v_persentage=0;  // all currenet v month  persentage  sum
                              $current_g_persentage=0;  // all currenet g  month  persentage  sum
                              $curr_v_per_count=0;    // used  for ven (NOT NULL entries) count++(it is  used  to calculate  average  current  month % (i.e(sum of ven%/quantity of  redords)))
                              $curr_g_per_count=0;    //used  for ven (NOT NULL entries) count++

                                foreach ($modelX  as $wC2)   
                              {
         //echo  "</br>" .$wC2->mydb_date."</br>";  //erase later  just  to  test  dates(display all  working  days);
         //echo "<p> End </p>";

                                $current_v_am= $current_v_am + $wC2->	mydb_v_am;  $current_v_h+=  $wC2->	mydb_v_h;   // calc  this  month Ven  amount  and  hours
                                $current_g_am= $current_g_am + $wC2->	mydb_g_am;  $current_g_h+=  $wC2->	mydb_g_h;   // calc  this  month  G  amount  and  hours 
                                $current_v_persentage= $current_v_persentage+  substr($wC2->	mydb_v_pers , 0, -1);   // calculate  all  Ven % (trim last  element "%")
                                $current_g_persentage= $current_g_persentage+  substr($wC2->	mydb_g_pers , 0, -1);  // calculate  all  Ven % (trim last  element "%")
                                if($wC2->	mydb_v_pers!=null){$curr_v_per_count=$curr_v_per_count+1;} //number of  Ven perc  entries(NOT NULL)(used  to  calculate current  average %)
                                if($wC2->	mydb_g_pers!=null){$curr_g_per_count=$curr_g_per_count+1;} //number of  G perc  entries(NOT NULL)
                              } //  END  FOREACH??????

                               echo "</br><p>Month  v_amount= <span style='color:red;'>".$current_v_am ."</span></p>"; // Ven  this  month all  amount
                               echo "<p>Month  v_hours=  <span style='color:red;'> ".$current_v_h ."</span></p>"; // Ven  this  month all  hours
                               echo "<p>Month  g_amount= <span style='color:red;'>".$current_g_am ."</span></p>";
                               echo "<p>Month  g_hours=  <span style='color:red;'> ".$current_g_h ."</span></p>";

     //if  no   If condition & no  Ven  Value=it  crashes
 if(/*$wC2->	mydb_v_pers*/$current_v_persentage!=null){echo "<p>Last  Month V  average % =  <span style='color:red;'> ".$current_v_persentage/$curr_v_per_count ."</span></   p>"; }
  else{echo "<p>This  Month V  average % =  <span style='color:red;'> Zero</span></p>";} // Calc  current  average  V % (sum of  V_perc/quantity of  records);

//if  no   If condition & no  Geo Value=it  crashes
if(/*$wC2->	mydb_g_pers*/$current_g_persentage!=null){echo "<p>Last  Month G  average % =  <span style='color:red;'> ".$current_g_persentage/$curr_g_per_count ."</span></p>";}
   else{echo "<p>This  Month V  average % =  <span style='color:red;'> Zero</span></p>";} 

                               //echo "<p>V count = ".$curr_v_per_count. ";  G count = " .$curr_g_per_count ."</p>"; // MAy  be  ereased ???
                                   $all_hours=$current_v_h + $current_g_h;// all this  month  V +G hours (for  some  bizzare  reason can't + it  in  folowwing  echo)
                               echo "<p>Last  month all hours=  <span style='color:red;'> ".$all_hours  ."</span></p>"; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//END inject(copied  from  Current  month-juast  changed in  foreach(X!!!  as))

 


              //Start  all  working  days 
                         echo "</br></br><h3 style=''color:red;'>Previouse month's working  days </h3>";
                        foreach ($modelX  as $wC2)   
                              { echo  "</br>" .$wC2->mydb_date."</br>";} 
              //  End  all  working  days




                         echo "</div></br>"; 
          } //  end  if ($period2=='previous') 

//                                **
// *********************************
// *********************************
// END Prev month  results  ONLY (implement  in Controller )---------------------------------











} 
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END  if  Person is  LOGGED

















// Start if  Person is  not  logged
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
    else {
           echo' <div  style="border:solid black 1px;padding:3%;display:inline-block">';
            echo Html::a( "LOG IN FIRST", ['/site/login', 'period' => "",   ] /* $url = null*/, $options = ['title' => 'Login',] ); 
            echo '</div>'; 
         }

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************         
// END if  Person is  not  logged
?>
<!---------------END Summary  ----------------->

</div>
