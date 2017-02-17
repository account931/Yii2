<?php
// Used  to  save  uploaded  img  path  to  db (or  exract  it)
//Uplading  the  file  by itself  is  in models/Gallery.php
namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $g_id
 * @property string $g_user
 * @property string $g_date
 * @property string $g_image
 */
class GalleryToDbSave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['g_user', 'g_date', 'g_image'], 'required'],   //  That  was  the  issue  in non saving  after  Uploading
            [['g_date'], 'safe'],
            [['g_user', 'g_image'], 'string', 'max' => 77],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'g_id' => 'G ID',
            'g_user' => 'G User',
            'g_date' => 'G Date',
            'g_image' => 'G Image',
        ];
    }
}
