<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
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
    const SETTING_NO = 0;
    const SETTING_OFF = 0;
    const SETTING_YES = 10;
    const SETTING_24_HOUR = 24;
    const SETTING_48_HOUR = 48;
    const SETTING_72_HOUR = 72;

    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_setting';
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
            [['user_id'], 'required'],
            [['user_id', ], 'unique'],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'100000'],
            [['filename', 'avatar'], 'string', 'max' => 255],
            [['user_id', 'reminder_eve', 'reminder_hours', 'contact_share', 'no_email', 'created_at', 'updated_at'], 'integer'],
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
        //$us = UserSetting::find()->where(['user_id'=>$user_id])->one();
        $us = UserSetting::findOne($user_id);
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
        return $us->user_id;
    }

    public function getEarlyReminderType($data)
    {
        $options = $this->getEarlyReminderOptions();
        return $options[$data];
    }

    public function getEarlyReminderOptions()
    {
        return array(
            self::SETTING_24_HOUR => '24 hours ahead',
            self::SETTING_48_HOUR => '48 hours ahead',
            self::SETTING_72_HOUR => '72 hours ahead',
            self::SETTING_OFF => 'Do not send an early reminder',
        );
    }

    public function deleteImage($path,$filename) {
        $file =array();
        $file[] = $path.$filename;
        $file[] = $path.'sqr_'.$filename;
        $file[] = $path.'sm_'.$filename;
        foreach ($file as $f) {
            // check if file exists on server
            if (!empty($f) && file_exists($f)) {
                // delete file
                unlink($f);
            }
        }
    }

}
