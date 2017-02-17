<?php
//Was  not  working->changed  in Conroller (actionregister $model=new User();  to  $model=new SignupForm();+added inn Conroller  use use app\models\SignupForm; +changed in SignupForm(model) rules (targetClass' => '/*common....*/  app\models\User') )
namespace app\models;

use Yii;
use app\models\User;
use yii\base\Model;
//use models\User;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_confirm;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'], //  the  problem was in blankspace in [targetClass' => '      app\models\User]
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 4],
//my compare passwords  & confirm
 ['password_confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match", /*'on' => 'update' */   ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
