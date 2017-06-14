<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "support".
 *
 * @property integer $supp_id
 * @property string $supp_user
 * @property string $supp_date
 * @property string $supp_ip
 * @property integer $supp_amount
 * @property integer $supp_hour
 */
class Support extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supp_user', 'supp_date', 'supp_amount', 'supp_hour'], 'required'],
            [['supp_amount', 'supp_hour'], 'integer'],
            [['supp_user','supp_date'], 'string', 'max' => 77],
            [['supp_ip'], 'string', 'max' => 88],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supp_id' => 'Supp ID',
            'supp_user' => 'Supp User',
            'supp_date' => 'Supp Date',
            'supp_ip' => 'Supp Ip',
            'supp_amount' => 'Supp Amount',
            'supp_hour' => 'Supp Hour',
        ];
    }
}
