<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mydbstart".
 *
 * @property integer $mydb_id
 * @property string $mydb_user
 * @property integer $mydb_v_am
 * @property integer $mydb_v_h
 * @property string $mydb_v_pers
 * @property integer $mydb_g_am
 * @property integer $mydb_g_h
 * @property string $mydb_g_pers
 */
class Mydbstart extends \yii\db\ActiveRecord
{
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
            [['mydb_v_am', 'mydb_v_h','mydb_date'], 'required'],  // [['mydb_user', 'mydb_v_am', 'mydb_v_h', 'mydb_v_pers'], 'required'],
            [['mydb_v_am'], 'integer'],    // [['mydb_v_am', 'mydb_v_h'], 'integer'],
            [['mydb_user'], 'string', 'max' => 77],
            [['mydb_v_pers'], 'string', 'max' => 44],
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
            'mydb_v_am' => 'Mydb V A',
            'mydb_v_h' => 'Mydb V H',
            'mydb_v_pers' => 'Mydb V Pers',  	
            'mydb_g_am' => 'Mydb G A',
            'mydb_g_h' => 'Mydb G H',
            'mydb_g_pers' => 'mydb_g_pers',
             'mydb_date' => 'Date',
        ];
    }
}
