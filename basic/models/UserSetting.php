<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_setting".
 *
 * @property int $id
 * @property int $user_id
 * @property string $filename
 * @property string $avatar
 * @property int $reminder_eve
 * @property int $reminder_hours
 * @property int $contact_share
 * @property int $no_email
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class UserSetting extends \yii\db\ActiveRecord
{
    const SETTING_YES = true;
    const SETTING_NO = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'filename', 'avatar', 'reminder_eve', 'reminder_hours', 'contact_share', 'no_email', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'reminder_eve', 'reminder_hours', 'contact_share', 'no_email', 'created_at', 'updated_at'], 'integer'],
            [['filename', 'avatar'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'filename' => 'Filename',
            'avatar' => 'Avatar',
            'reminder_eve' => 'Reminder Eve',
            'reminder_hours' => 'Reminder Hours',
            'contact_share' => 'Contact Share',
            'no_email' => 'No Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function initialize($user_id)
    {
        $us = UserSetting::find()->where(['user_id'=>$user_id])->one();
        if (is_null($us)){
            $us = new UserSetting();
            $us->user_id = $user_id;
            $us->filename = '';
            $us->avatar = '';
            $us->reminder_eve = self::SETTING_YES;
            $us->no_email = self::SETTING_NO;
            $us->contact_share = self::SETTING_YES;
            $us->reminder_hours = 48;
            $us->save();
        }
        return $us->id;
    }

}
