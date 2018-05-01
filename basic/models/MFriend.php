<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "m_friend".
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 * @property int $status
 * @property int $number_meetings
 * @property int $is_favorite
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $friend
 * @property User $user
 */
class MFriend extends \yii\db\ActiveRecord
{
    public $email;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_friend';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'email'],
            [['user_id', 'friend_id'], 'required'],
            [['user_id', 'friend_id', 'status', 'number_meetings', 'is_favorite', 'created_at', 'updated_at'], 'integer'],
            ['user_id', 'compare','compareAttribute' => 'friend_id', 'operator'=>'!=','message'=>'You can\'t add yourself as a friend'],
            ['email', 'unique', 'targetAttribute' => ['user_id', 'friend_id'],'message' =>'You\'ve already added this friend'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'friend_id' => 'Friend ID',
            'status' => 'Status',
            'number_meetings' => 'Number Meetings',
            'is_favorite' => 'Is Favorite',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriendList()
    {
        return $this->hasOne(User::className(), ['id' => 'friend_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    public function lookupEmail($email) {
        // lookup email address, return user_id if it exists
        if (User::find()->where(['email' => $email])->exists()) {
            return User::find()->where(['email' => $email])->one()->id;
        } else {
            // doesn't exist
            return false;
        }
    }

    public function addUser($email) {
        // register a user based on email
        $user = new User();
        $user->email = $email;
        $user->username = $email;
        //$user->status = User::STATUS_PASSIVE;
        $user->setPassword( Yii::$app->security->generateRandomString());
        $user->generateAuthKey();
        $user->save();
        return $user->id;
    }

    public function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);
        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }
        return $result;
    }
}
