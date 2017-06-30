<?php

namespace app\models;

use Yii;
use yii\base\Model;

//Search form for searching

class SearchFormMine extends Model
{
    public $q;
   

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            
            ['q', 'string', 'message'=>'your text'],
           
        ];
    }



public function attributeLabels()
    {
        return [
            'q' => 'S',
            
        ];
    }








}
?>
