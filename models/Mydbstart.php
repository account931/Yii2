<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mydbstart".
 *
 * @property integer $mydb_id
 * @property string $mydb_user
 * @property string $mydb_date
 * @property integer $mydb_v_am
 * @property double $mydb_v_h
 * @property string $mydb_v_pers
 * @property integer $mydb_g_am
 * @property double $mydb_g_h
 * @property string $mydb_g_pers
 */
class Mydbstart extends \yii\db\ActiveRecord
{
 public $v_pcsBEFORE; //  erase it  if  BeforeSave  dos not  work;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mydbstart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [



            [['mydb_date',], 'required', 'message'=>'Be careful "{attribute}"  is empty.'], // 'mydb_v_am', 'mydb_v_h'
            [['mydb_v_am', 'mydb_g_am'], 'integer'],
            [['mydb_v_h', 'mydb_g_h'], 'number'],
            [['mydb_user'], 'string', 'max' => 77],
            [['mydb_date', 'mydb_g_pers'], 'string', 'max' => 55],
            [['mydb_v_pers'], 'string', 'max' => 44],




//
['mydb_v_am','required','when'=>function($model) {return $model->mydb_v_h != ''; }], //  if  venues  amount  was  printed
['mydb_v_h','required','when'=>function($model) {return $model->mydb_v_am != ''; }],


['mydb_g_am','required','when'=>function($model) {return $model->mydb_g_h != ''; }],  //  if  geo  amount  was  printed
['mydb_g_h','required','when'=>function($model) {return $model->mydb_g_am != ''; }],

['mydb_v_am','required','when'=>function($model) {return $model->mydb_g_am == ''; }], //  don't  let  the  empty form  go

//




        ];
    }









    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mydb_id' => 'Mydb ID',
            'mydb_user' => 'Mydb User',
            'mydb_date' => 'Date',
            'mydb_v_am' => 'Ven pcs',
            'mydb_v_h' => 'V Hours',
            'mydb_v_pers' => 'Mydb V %',
            'mydb_g_am' => 'Geo pcs',
            'mydb_g_h' => 'G Hours',
            'mydb_g_pers' => 'Mydb G %',
        ];
    }






//beforeSave();
// **************************************************************************************
// **************************************************************************************
//                                                                                     **
//------------------------
//does not  work  at all-> WORKS!!!!!!!!!!!!!!!!!!!! (wasn't  working  beacause  used $_POST['Mydbstart']['mydb_v_am'] instead of  $this->mydb_v_am )
public function beforeSave($insert)  //$insert
{
    if (parent::beforeSave(false)) {

 
        // Place your custom code here
                
                // $model = new Mydbstart(); // Instead  of  creating  a New Model- u have  to  use {$this};
//NEW
//$curr = self::findByPk($this->id); //::find()->orderBy ('mydb_id DESC')  ->all(); //WON't  work  we  don't  needd  getting  old  value  from SQL
//END NEW
             if(!empty($this->mydb_v_am))   {  // if Ven  value  exists
                // $v_pcs=$_POST['Mydbstart']['mydb_v_am']/($_POST['Mydbstart']['mydb_v_h']*44)*100; // Here we  should  just use $this->field;
                   $v_pcs=$this->mydb_v_am/($this->mydb_v_h*44)*100; //  USING {$this->field}  forced  beforeSave()  working 
                 $v_pcs=round($v_pcs, 2); //round  to  2 digits;
                 $v_pcsBEFORE=$v_pcs."%" ;
                 $this->mydb_v_pers=$v_pcsBEFORE;  //assign  % to  table 
                 }// END if(!empty($this->mydb_v_am)) 
                 



   
          if(!empty($this->mydb_g_am))   {  // if Geo  value  exists
                 $g_pcs=$this->mydb_g_am/($this->mydb_g_h*30)*100; 
                 $g_pcs=round($g_pcs, 2); //round  to  2 digits;
                 $g_pcs=$g_pcs."%";
                 $this->mydb_g_pers=$g_pcs;
                 } //  end if(!empty($this->mydb_g_am))  

// Emd  Place your custom code her



        return true;
    } else {
        return false;
    }
} // END BEFORESAVE();
// **                                                                                  **
// **************************************************************************************
// **************************************************************************************
//---------------------------------------------------------


/*
public boolean beforeSave ( $insert )
$insert	boolean	
Whether this method called while inserting a record. If false, it means the method is called while updating a record.
*/











}
