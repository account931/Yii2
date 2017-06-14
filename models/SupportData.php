<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supportData".
 *
 * @property integer $sData_id
 * @property string $sData_user
 * @property string $sData_ip
 * @property string $sData_date
 * @property string $sData_header
 * @property string $sData_text
 * @property string $sData_category
 */
class SupportData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supportData';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sData_header', 'sData_text'], 'required'],
            [['sData_header', 'sData_text'], 'string'],
            [['sData_user', 'sData_ip', 'sData_date', 'sData_category'], 'string', 'max' => 77],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sData_id' => 'S Data ID',
            'sData_user' => 'S Data User',
            'sData_ip' => 'S Data Ip',
            'sData_date' => 'S Data Date',
            'sData_header' => 'S Data Header',
            'sData_text' => 'S Data Text',
            'sData_category' => 'S Data Category',
        ];
    }
}
