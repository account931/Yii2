<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm; 
use app\models\Mydbstart;
use app\models\MydbstartR;
use app\models\User;
use app\models\SignupForm;
use app\models\Gallery;
use app\models\GalleryToDbSave;

use yii\web\UploadedFile;   //  for  gallery  uploads

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
//use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\db\Expression; //  expression  for  SQL  datetime created("Now")
use yii\base\ErrorException; //  exception

use yii\web\NotFoundHttpException;//second

use yii\data\Pagination;



class SiteController extends Controller
{
public $v_pcs; //  Confirm deletion ; 
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                  //'class' => VerbFilter::className(),//mine
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                     'delete' => ['POST'], //Mine  Second
                     'findModelEditProfile'=>['POST'], //  was  added

                       'DeleteGallery'=>['POST'],  //Gallery
                       'findModelGallery'=>['POST'], //GAllery
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();  

        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

//new
//return $this->redirect(Yii::$app->request->referrer);
//return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
//new

             //set flash
             /*Yii::$app->getSession()->setFlash('logged', "You are logged successfully !!!!!!!!!!");$model->username="";$model->username="";$model->password="";*/

           return $this->goBack();
//return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }





//MYDBSTART
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//***********************************
//----------------------------------

    public function actionMydbstart()
    {



// Not  working  AJAX
/*if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
    Yii::$app->response->format = Response::FORMAT_JSON;
    return ActiveForm::validate($model);
}*/
//






//Start INSERTING
$model = new Mydbstart();






if(isset($_POST['Mydbstart'])) {
//$model->mydb_v_am =$_POST['Mydbstart']['mydb_v_am'];
//$model->mydb_v_h = $_POST['Mydbstart']['mydb_v_h'];
//$model->mydb_user= 'Dima';$model->mydb_v_pers ='33%'; // WTF it  claims  default  value?-  Just needed  to  set  this  fields  to  Null  by  deafault
$model->attributes = $_POST['Mydbstart'];// WORKS!!!!




  //setting  my Calculation for  V;
 try{
 if ( !empty($_POST['Mydbstart']['mydb_v_am']) &&   !empty($_POST['Mydbstart']['mydb_v_h'])   ){   
       

  
                 $v_pcs=$_POST['Mydbstart']['mydb_v_am']/($_POST['Mydbstart']['mydb_v_h']*44)*100; 
                 $v_pcs=round($v_pcs, 2); //round  to  2 digits;
                 $v_pcs=$v_pcs."%" ;
                 $model->mydb_v_pers=$v_pcs;  //assign  % to  table 

                                        }  //  END if ( !empty($_POST['Mydbstart']['myd'];

}catch (ErrorException $e) { Yii::warning("Деление на ноль.");}  // END of  try  /catch

 
// end  setting  my  Calculation for  V;






 //setting  my Calculation for  G;
try{
  if ( !empty($_POST['Mydbstart']['mydb_g_am'])  ) {

                 $g_pcs=$_POST['Mydbstart']['mydb_g_am']/($_POST['Mydbstart']['mydb_g_h']*30)*100; 
                 $g_pcs=round($g_pcs, 2); //round  to  2 digits;
                 $g_pcs=$g_pcs."%" ;
                 $model->mydb_g_pers=$g_pcs;  //assign  % to  table 
                                          } //  END  ( !empty($_POST['Mydbstart']['mydb_g_am'])  )
}catch (ErrorException $e) { Yii::warning("Деление на ноль.");}  // END of  try  /catch
// end  setting  my  Calculation for  G;


//saving  DateStamp  of  creating  the  record
$model->mydb_created = new Expression('NOW()');

//setting  user  to  DB (if u are logged)  // It  was  useful previously,  when this section was  open  for  logged  &  unlogged, now  can  be  deconstructed
 if(!Yii::$app->user->isGuest){ 
$model->mydb_user= Yii::$app->user->identity->username;}




//Vars  for  flash oNLY
   if ( !empty($_POST['Mydbstart']['mydb_v_am'])  ){ //   to prevent  errors  when no  Geo  input  exists;
$v_am=$_POST['Mydbstart']['mydb_v_am'];//just  var  for  flash
$v_h=$_POST['Mydbstart']['mydb_v_h'];//just  var  for  flash
                                                      }else {$v_am=0;$v_h=0;$v_pcs=0;}

      if ( !empty($_POST['Mydbstart']['mydb_g_am'])  ){ //   to prevent  errors  when no  Geo  input  exists;
$g_am=$_POST['Mydbstart']['mydb_g_am'];//just  var  for  flash
$g_h=$_POST['Mydbstart']['mydb_g_h'];//just  var  for  flash
                                                      }else {$g_am=0;$g_h=0;$g_pcs=0;}
// END  Vars  for  flash oNLY



if ($model->save()) {

//reseting  fields 
$model->mydb_v_am= '';$model->mydb_v_h='';

//FLASHES!!!! //if  set  after F5  refreshing  won't  work;
Yii::$app->getSession()->setFlash('savedItem', "Saved $v_am venues per $v_h hours     with $v_pcs   performance  rate . G = $g_am / $g_h = $g_pcs");







//prevent  F5  resending
//Mydbstart::model()->unsetAttributes(); 
//$model=new Mydbstart();// not  working
return $this->refresh();//  Worked in Yii 1.1 without  return !!!Prevent from sending   form on the  reload of  page
 

 } //end  if  Save

} //END if(isset($_POST['MyDBStart']
//END  INSERTING---------------------





//Start  Active  Record-----------------------------------------------------------------------------------
//$actrec = \app\models\Mydbstart::findAll([1,2,3]); // WORKING!! just the  same  as below;

// Start if  Person is  LOGGED or UnLoGGED (!Guest/Guest)
       //If Logged Show  only Users log  else {show  any  last  logs}
    if(!Yii::$app->user->isGuest){
  $activeRec = Mydbstart::find()   ->orderBy ('mydb_id DESC')  ->limit('5') ->where(['mydb_user' => Yii::$app->user->identity->username])  ->all();  // WORKING!!  //->where(['mydb_user' => Yii::$app->user->identity->username]);
                                 }else {
  $activeRec = Mydbstart::find()   ->orderBy ('mydb_id DESC')  ->limit('5')  ->all();
//END if  Person is  LOGGED or UnLoGGED (!Guest/Guest)
                                        }




//END ActiveRecord-----------------------------------------------------------------------------------------






//Start DetaiView-------------------------------------------------
 $detailview = Mydbstart::find()   ->orderBy ('mydb_id DESC')  ->all();// ->limit('5') 
//END DetaiView --------------------------------------------------








//Start ListView (DataProvider) -----------------------------------------
if(!Yii::$app->user->isGuest){
$dataProvider = new ActiveDataProvider([
    'query' => Mydbstart::find()->where(['mydb_user' => Yii::$app->user->identity->username]),
    'pagination' => [
        'pageSize' => 6,
    ],
    'sort'=> ['defaultOrder' => ['mydb_id'=>SORT_DESC]],

]);
}
//END ListView -------------------------------------------








//Start GridView ---------------------------------------------------
if(!Yii::$app->user->isGuest){
$dataProviderGrid = new ActiveDataProvider([
    'query' => Mydbstart::find()->where(['mydb_user' => Yii::$app->user->identity->username]),
    'pagination' => [
        'pageSize' => 4,],
     'sort'=> ['defaultOrder' => ['mydb_id'=>SORT_DESC]],

]);
}
//END GridView -----------------------------------------------------





//RENDER  FOR  LOGGED  ONLY
 if(!Yii::$app->user->isGuest){
      //  FINAL  RENDERING
        return $this->render('mydbstart', [
            'model' => $model,                              // FOR INSERT?????
            'activeRec' => $activeRec,                        //just Active Record;
            'detailview'=>$detailview,                   //DetailView
            'dataProvider'=>$dataProvider,             //DataProvider for  ListView
            'dataProviderGrid'=>$dataProviderGrid,   //DataProvider for GridView
        ]);
    }//  END Final  render  for  LOGGED
     else{return $this->render('mydbstart');} // if  not  logged RENDER  this
    

  }//  action  end 
//---------------------------------------------------------------------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//





















//REGISTRATION
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionRegistartion()
    {

$model = new SignupForm();

//----
  
         // $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                  //SET FALSH
                  Yii::$app->getSession()->setFlash('regged', "Your  account  is  created & You're already  logged in");
                    return $this->goHome();
                }
            }
        }

       
        
//---------


 return $this->render('registration' , ['model' => $model,]  );
    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//










//REGISTRATION
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionMypage()
    {


 return $this->render('mypageview' /*, ['model' => $model,]*/  );

    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END //REGISTRATION













//AdmiN
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionAdmin()
    {



// ***********************
// ***********************
//                      ** 
//FOR USER WITH    ADMIN RIGHTS ONLY(in  fact  for  a  lgged  USer  ,  who has  either  role=1 or  role=2;)
if(!Yii::$app->user->isGuest){
   if ( strcmp ( Yii::$app->user->identity->role, 2) == 0  ) 
   {
       //

//Start GridView ---------------------------------------------------
$dataProviderGrid = new ActiveDataProvider([
    'query' => Mydbstart::find()/*->where(['mydb_user' => Yii::$app->user->identity->username])*/,
    'pagination' => [
        'pageSize' => 25,],
     'sort'=> ['defaultOrder' => ['mydb_id'=>SORT_DESC]],

]);
//END GridView -----------------------------------------------------
       //
    return $this->render('adminview' , ['dataProviderGrid' => $dataProviderGrid,] );//change

 
}// END if ( strcmp ( Yii::$app->user->identity->role, 2) (i.e  Admin )
                   else{return $this->render('adminview');}  // if  a  person is  logged  but  has    role =1;
//END FOR USER WITHA  DMIN RIGHTS ONLY
// **                   **
// ***********************
// ***********************

} //  END !isGuest








// ***********************
// ***********************
//                      **
// IF  HAS  NO   ADMIN RIGHTS 

 else {                   
 return $this->render('adminview'  /*, ['model' => $model,]*/  );
      }//  End  ELSE

//END  IF  HAS  NO   ADMIN RIGHTS
// **                   **
// ***********************
// ***********************



    

    }



/*  FROM  1
   $role=Yii::app()->user->getState('roleX') ;  // Getting  User's  role (1 or  2)
    $roleC="1"; //Value  for  User's  access, 2 is  an Admin Value  ,  1-is  a User
    $roleA="2"; //  value  for  admin
    if ( strcmp ( $role, $roleC) == 0  )    //  simple  comparison (if($roleC=='1')) -causes  error  crashing;
        { $this->render('adminFalse',array('model'=>$model, )); 
                             }



// if Admin (i.e $roleA="2";)
else if ( strcmp ( $role, $roleA) == 0  ) {
*/
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END ADMIN




















//Calc
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionCalc()
    {


 return $this->render('calcview' /*, ['model' => $model,]*/  );

    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END Calc






//Split
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionSplit()
    {


 return $this->render('splitview' /*, ['model' => $model,]*/  );

    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END Split









//EditPROFILE  // LOADS MODEL  but  dos not  save  so far
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionEditprofile($idE)
    {

    $model = $this->findModelEditProfile($idE);//  LAST WORKING
  //$model=new User();
 //return $this->render('editprofile' , ['model' => $model,]  );

//
 if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            
            return $this->redirect(['view', 'id' => $model->id]);  // so  far,  renders  view  for MyDBStart  ,not  for User  model;


        } else { 
                 //$model = $this->findModelEditProfile($id);//inj
            return $this->render('editprofile', [
                'model' => $model,
            ]);
        }
//

    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//EditPROFILE






//Summary
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionSummary()
    {

$model = new Mydbstart();


              //  if  Person is LOGGED------------------------
              if(!Yii::$app->user->isGuest){ 
  


           //Model  for  all entries
                 $summary = Mydbstart::find()  ->orderBy ('mydb_id DESC')   ->where([   'mydb_user' => Yii::$app->user->identity->username, ])  ->all();
              // $summary = Mydbstart::find()   ->orderBy ('mydb_id DESC')  /*->limit('5')*/ ->where([   'mydb_user' => Yii::$app->user->identity->username, /* 'mydb_id'=>1*/ ])  ->andWhere(['between', 'mydb_date', "1-Dec-Fri-2016", "21-Dec-Fri-2016"]) ->all();
           // END Model  for  all entries




               //START Model  for CURRENT  month  ONLY---------------------------

                 $todayMonth=date('M'); $todayYear=date('Y');   // getting  to  today  month  &  year; /*month is literal,not  numeric*/

                 $todayMonthNumeric=date('m'); //Numeric  month (i.e 0-9)
                 $days_in_this_month=cal_days_in_month(CAL_GREGORIAN,$todayMonthNumeric,$todayYear);
                //creating templates  for SQl  condition (i.e "1-Dec-Fri-2016");
                  $startDAte= "1-" .$todayMonth.  "-"   .$todayYear;
                  $endDAte=   $days_in_this_month. "-" .$todayMonth.  "-"  .$todayYear;


                $current = Mydbstart::find()   ->orderBy ('mydb_id DESC')  /*->limit('5')*/ ->where([   'mydb_user' => Yii::$app->user->identity->username, /* 'mydb_id'=>1*/   ]) /* ->andWhere(['between', 'mydb_date', $startDAte, $endDAte   ])  */ ->andFilterWhere(['like', 'mydb_date', $todayMonth])  ->andFilterWhere(['like', 'mydb_date', $todayYear])    ->all(); 

               //END Model  for CURRENT  month  ONLY-------------------------
          




               //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            //START Model  for Previous  month  ONLY 

                  $PrevMonth=date('M', strtotime(date('Y-m')." -1 month"));          $PrevYear=date('Y', strtotime(date('Y-m')." -1 month"));   // getting previous  month  and  year; 
                 //creating templates  for SQl  condition (i.e "1-Dec-Fri-2016");
           $startDAtePrev= "1-" .$PrevMonth.  "-"   .$PrevYear; // temporary
                     // $startDAte_Prev= "1-Nov-2016";
                    //$endDAte_Prev= "30-Nov-2016";;
           $endDAtePREV= "30-" .$PrevMonth.  "-"   .$PrevYear; //  temopary


                  $modelX = Mydbstart::find()   ->orderBy ('mydb_id DESC')  /*->limit('5')*/ ->where([   'mydb_user' => Yii::$app->user->identity->username, /*'mydb_id'=>89*/  ]) /* ->andWhere(['between', 'mydb_date', $startDAtePrev, $endDAtePREV]) */  ->andFilterWhere(['like', 'mydb_date', $PrevMonth])  ->andFilterWhere(['like', 'mydb_date', $PrevYear])       ->all();
            //END  Model  for Previous  month  ONLY  
   





                            return $this->render('summary' , 
                                                ['summary'      => $summary,                  //  Model  for  All  entries
                                                 'current'      => $current , //  Model  for  current  month  only
                                                 'modelX'=>$modelX , ]); // previous  month
               } //  END if(!Yii::$app->user->isGuest)
              // END   if  Person is LOGGED-------------------







       else { //IF USER IS NOT LOGGED (in fact it is  not used , just  fo fix error, as  we  need  some  $summary  to render,) // Confirn  DELETE ?????
            //$summary = Mydbstart::find()   ->orderBy ('mydb_id DESC') /* ->limit('5') ->where(['mydb_user' => Yii::$app->user->identity->username]) */ ->all(); //CONFIRM DELETE??????
            //$current= Mydbstart::find()   ->orderBy ('mydb_id DESC') ->all(); //  won't  use  just  avoid  errors
                return $this->render('summary' ); //  in  unlogged  render  without any  models 
            }


 

    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END Summary















//Gallery
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 

 public function actionGallery()
    {
$model = new Gallery();            // Model  for  upload;
$modelDB = new GalleryToDbSave();    //Model  for  saving  path  to  DB (&extracting)



 

    if (Yii::$app->request->isPost) {
        $model->file = UploadedFile::getInstance($model, 'file');


        if ($model->validate()) {                
           $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                           $path='uploads/' . $model->file->baseName . '.' . $model->file->extension; 



                       //Saving  to  DB(collecting img path, user name,ip, date )--------------
                       if(!Yii::$app->user->isGuest){$modelDB->g_user=Yii::$app->user->identity->username;}else{$modelDB->g_user="unlogged";}
                      $modelDB->g_image=$path; $modelDB->g_date=date('Y-m-d H:i:s');  $modelDB->g_ip=$_SERVER['REMOTE_ADDR'];
                                              if ($modelDB->save()) {Yii::$app->getSession()->setFlash('gallery_DB_SAVED', "Successfully inserted  to  SQL"); }else
                                                                    {Yii::$app->getSession()->setFlash('gallery_DB_SAVED', "SCREWED!!!!!!!!!"); }
                       //END  Saving  to  DB----------------------------------------------------
                             
                       

                    //Flash
                    Yii::$app->getSession()->setFlash('gallery_SAVED', "$path =>  has been SAVED ");

     return $this->refresh();//  Worked in Yii 1.1 without  return !!!Prevent from sending   form on the  reload of  page

        } //End  if ($model->validate())




    }//END if (Yii::$app->request->isPost







//Start ListView  For  GAllery (DataProvider) -----------------------------------------
if(!Yii::$app->user->isGuest){
$activeRec=GalleryToDbSave::find()   ->orderBy ('g_id DESC')  ->limit('5') ->where(['g_user' =>Yii::$app->user->identity->username]) ->all(); 





//Start ListView (DataProvider) -  WORKING----------------------------------------
    $dataProvider = new ActiveDataProvider([
    'query' =>GalleryToDbSave::find()->where(['g_user'=> Yii::$app->user->identity->username])->orderBy('g_id DESC'),
    'pagination' => [
        'pageSize' => 6,
    ],
   // 'sort'=> ['defaultOrder' => ['g_id'=>SORT_DESC]],

]);
//END ListView -------------------------------------------




 
                             } //  if  !Guest
//END ListView   for  Gallery -------------------------------------------------






if(!Yii::$app->user->isGuest){ //  if  user is logged
    return $this->render('gallery', ['model' => $model ,               //  may  be  omitted?????
                                     'modelDB' =>$modelDB,
                                     'activeRec'=>$activeRec ,       //Model for Active Record
                                     'dataProvider'=>$dataProvider, //Dataprovider for  ListView
                                     ]);
                             }else{ 
                                    //if  not logged
                                   return $this->render('gallery', ['model' => $model ,               //  may  be  omitted?????
                                                                    'modelDB' =>$modelDB,
                                     
                                                                                         ]);
                                   } // END  ELSE
}  


// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
// END Gallery











//Bootstrap
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionBstrap()
    {

  
            return $this->render('bstrap'/*, [
                'model' => $model,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  Bootstrap











//Reroute
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionReroute()
    {

  
            return $this->render('reroute'/*, [
                'model' => $model,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  End  Reroute












//Geocoding  HardCore
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionGeocoding()
    {

  
            return $this->render('geocoding'/*, [
                'model' => $model,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  Geocoding  HArdcore











//Sort  unsorted
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
 public function actionSort()
    {

  
            return $this->render('sort'/*, [
                'model' => $model,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END    Sort Unsorted





//MyWazeTime
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
public function actionMytime()
    {

  
            return $this->render('wazeTime'/*, [
                'model' => $model,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  MyWazeTime












//pageLinker
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
public function actionPagelinker()
    {
           $query=Mydbstart::find()->orderBy ('mydb_id DESC') ;
           $pages= new Pagination(['totalCount' => $query->count(), 'pageSize' => 7]);
           $models = $query->offset($pages->offset)->limit($pages->limit)->all();

  
            return $this->render('pageLinker', [
                'models' => $models,
                'pages' => $pages,
            ]);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END  pageLinker








//WazeTrim
// **************************************************************************************
// **************************************************************************************
//                                                                                     ** 
//-------------------------
public function actionTrim()
    {
        
  
            return $this->render('trim'/*, [
                'models' => $models,
                'pages' => $pages,
            ]*/);



    }
//------------------------------------

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//END WazeTrim














// Mine (donored) !!!!!
//Donar  from Gii  Generated MydbstartController (contains needed  stuff for  GridView(view/delete/update))
 /**
     * Displays a single Mydbstart model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mydbstart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mydbstart();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->mydb_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }







//UPDATE
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
    /**********************
     * Updates an existing Mydbstart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);




//Mine-------------------------
// so  far. it  it  recalculated  but  dos not  savein entire session -must  update  it  twice
//Update is  performed  a  bit  diffrent  in comparison  to Yii 1;

 //setting  my Calculation for  V;  // NOT IN USE -reassigned to beforeSave() in Model ,as   update % recalculation didn't  wark  as in Yii1.
//if ( !empty($_POST['Mydbstart']['myDB_v_pcs'])  ){
                /* $v_pcs=$model->mydb_v_am/ ($model->mydb_v_h *44)*100; 
                 $v_pcs=round($v_pcs, 2); //round  to  2 digits;
                 $v_pcs=$v_pcs."%" ;*/
                 // below & up code is  reassigned to beforeSave() in  Model ()
                 //$model->mydb_v_pers=$v_pcs;  //assign  % to  table  & get  value- WORKS IN DOUBLE CLICKING;
                

                 
                                         // }
// end  setting  my  Calculation for  V;



//setting  my Calculation for  G; // NOT IN USE -reassigned to beforeSave() in Model ,as   update % recalculation didn't  wark  as in Yii1.
  if ( !empty($model->mydb_g_am)  ){
                 /*$g_pcs=$model->mydb_g_am/($model->mydb_g_h*30)*100; 
                 $g_pcs=round($g_pcs, 2); //round  to  2 digits;
                 $g_pcs=$g_pcs."%" ;*/
                 // below & up code is  reassigned to beforeSave() in  Model ()
                 //$model->mydb_g_pers=$g_pcs;  //assign  % to  table 
                                          }
// end  setting  my  Calculation for  G;


//END Mine--------------------------------------




//$model->save();




        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $model->save();// WTF??????????????????-  IT IS  NOT NECESSARY(though worked  with it  too)-MY BUG
            return $this->redirect(['view', 'id' => $model->mydb_id]);


        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
//END UPDATE-------------------------------------------------------------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************






    /**
     * Deletes an existing Mydbstart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['mydbstart']);//index
    }

    /**
     * Finds the Mydbstart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mydbstart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mydbstart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
//End  Mine (donored)
//END //Donar  from Gii  Generated MydbstartController (contains needed  stuff for  GridView(view/delete/update))




//Mine  for  EditProfile
protected function findModelEditProfile($idE)
    {
        if (($model2 = User::findOne($idE)) !== null) {
            return $model2;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
//END //Mine  for  EditProfile










// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//------------------------------------------------
//  DELETE  ACTION IN  GALLERY   
//Normanlly  it  must  implemented  in  a  separeat  Controller (GalleryToDbSave)  but  it  sucks

 public function actionDelettte($id){ 
       
          //return $this->render('about');
       
       $this->findModelGallery($id)->delete();
       return $this->redirect(['gallery']);//index
    }




protected function findModelGallery($id)
    {
        if (($model =GalleryToDbSave::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist!!!!!!!.');
        }
    }
// END DELETE  ACTION IN  GALLERY
//-------------------------------------------------
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************












}
