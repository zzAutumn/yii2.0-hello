<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/26
 * Time: 下午2:44
 */
namespace app\models;
use dektrium\user\models\User as BaseUser;
use Yii;
class User extends BaseUser
{
    const ROLE_USER = 10;
    const ROLE_MODERATOR = 20;
    const ROLE_ADMIN = 30;

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_PASSIVE = 20;

    public function register()
    {
        //do something

    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

}