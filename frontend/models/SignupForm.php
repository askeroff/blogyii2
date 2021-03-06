<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;
use yii\rbac\PhpManager;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password2;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password2', 'compare', 'compareAttribute'=>'password'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if ($user->save()) {
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole('user');
                $auth->assign($userRole, $user->id);
                return $user;
            }
        }

        return null;
    }


    public function attributeLabels(){

        return array('username' => 'Логин' ,
                     'email' => 'Почта',
                     'password' => 'Пароль',
                     'password2' => 'Повторите пароль',
   
            );
    }
}
