<?php
//
//Controller for Support CR's knowledge base
//used  for  support Data Base, knowledge base most  frequent used topics
namespace app\controllers;

use Yii;

use app\models\SupportData;
use app\models\SupportDataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

use yii\data\Pagination;
use yii\data\ActiveDataProvider;

use app\models\SearchFormMine; //our model for search

/**
 * SupportDataController implements the CRUD actions for SupportData model.
 */
class SupportDataController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SupportData models.
     * @return mixed
     */





//----------------------------------------------
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
    public function actionIndex()
    {

//  default  grid View
        $searchModel = new SupportDataSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams); //was  by  default
     $dataProvider = new ActiveDataProvider([
    'query' => SupportData::find()/*->where(['mydb_user' => Yii::$app->user->identity->username])*/,
    'pagination' => [
        'pageSize' => 4,],
     'sort'=> ['defaultOrder' => ['sData_id'=>SORT_DESC]],

]);





//Form  create--------------------
 $model = new SupportData();

             $model->sData_user="dima";
             $model->sData_ip=$_SERVER['REMOTE_ADDR'];
             $model->sData_date=date('j-M-D-Y'); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                               //$model->sData_header="yes";//clear field


                               //FLASHES!!!! //if  set  after F5  refreshing  won't  work;
							    Yii::$app->getSession()->setFlash('savedItemZ', "We saved your item  ->>  <b> $model->sData_header</b>");
								//prevent  F5  resending
								//Mydbstart::model()->unsetAttributes(); 
								//$model=new Mydbstart();// not  working
								return $this->refresh();


            //return $this->redirect(['view', 'id' => $model->sData_id]);
// end if ($model->load(Yii::$app->request->post()) && $model->save())

        } else { 
                  //Yii::$app->getSession()->setFlash('savedItemZ', "<span style='color:red;'>Please check your form, something was wrong ->> Your input was not saved </span> ");
           /* return $this->render('create', [
                'model' => $model,
            ]);*/
        }
//  end  Form  create---------------








//PageLinker
           $query=SupportData::find()->orderBy ('sData_id DESC') ;
           $pages= new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
           $modelPageLinker = $query->offset($pages->offset)->limit($pages->limit)->all();

  
           /* return $this->render('pageLinker', [
                'models' => $models,
                'pages' => $pages,
            ]);*/
//end  pageLinker





//search model init-----------------------------
$searchMine=new SearchFormMine();
if ($searchMine->load(Yii::$app->request->post()) && $searchMine->validate()) 
   {
         $q=Html::encode($searchMine->q);
         return $this->redirect (Yii::$app->urlManager->createUrl (['support-data/searchmine','q'=>$q]));
   }
//END search model init--------------------------






//RENDER
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,   //def grid
            'model' => $model,       //  form 

            'pages' => $pages,      //pageLinker
            'modelPageLinker' => $modelPageLinker, //pageLinker
               'searchMine'=>$searchMine, //search
        ]);
    }

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  
//------------------------------------------------------
// END  Index





//PROBLEM HERE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//Search
//andFilterWhere(['like', 'sData_text', Yii::$app->getRequest()->getQueryParam('q')])==LIKE
//----------------------------------------------
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
    public function actionSearchmine()
    {
      //PageLinker
                            
           $query=SupportData::find()->orderBy ('sData_id DESC')->andFilterWhere(['like', 'sData_text', Yii::$app->getRequest()->getQueryParam('q')])/*->where(['sData_text'=>Yii::$app->getRequest()->getQueryParam('q') ])*/ /* ->all()*/;
 
           $pages= new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
           $modelPageLinker = $query->offset($pages->offset)->limit($pages->limit)->all();  
       //end  pageLinker






//RENDER
        return $this->render('searchmine', [
             'modelPageLinker' => $modelPageLinker, //pageLinker
             'pages' => $pages,      //pageLinker
]);
    }

// **                                                                                  **
// **************************************************************************************
// **************************************************************************************  
//------------------------------------------------------
// END  Search

















    /**
     * Displays a single SupportData model.
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
     * Creates a new SupportData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SupportData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
							
            return $this->redirect(['view', 'id' => $model->sData_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SupportData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sData_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SupportData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SupportData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SupportData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SupportData::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
