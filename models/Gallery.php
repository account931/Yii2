<?php
//JUST  upload  file  & moves  it  to  upload  folder . Adding  to db  is  implemented  in models/Gallery_to_db.php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class Gallery extends Model
{
/**
 * @var UploadedFile|Null file attribute
 */
public $file;

/**
 * @return array the validation rules.
 */
public function rules()
{
    return [
        [['file'], 'file'],
         [['file', ], 'required'],  //Mine  
    ];
}
}
?>
