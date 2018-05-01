<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user_contact".
 *
 * @property int $id
 * @property int $user_id
 * @property int $contact_type
 * @property string $info
 * @property string $details
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class UserContact extends \yii\db\ActiveRecord
{

       const TYPE_OTHER = 0;
       const TYPE_PHONE = 10;
       const TYPE_QQ = 20;
       const TYPE_WEIXIN = 30;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_contact';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'info'], 'required'],
            [['contact_type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username'],'safe'],
            [['details'], 'string'],
            [['info'], 'string', 'max' => 255],
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
            'contact_type' => 'Contact Type',
            'info' => 'Info',
            'details' => 'Details',
            'status' => 'Status',
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


    public function getUserContactTypeOptions()
    {
        return array(
            self::TYPE_OTHER => 'Other',
            self::TYPE_PHONE => 'Phone',
            self::TYPE_QQ => 'QQ',
            self::TYPE_WEIXIN => 'Weixin',
        );
    }

    public function getUserContactType($data)
    {
        $options = $this->getUserContactTypeOptions();
        return $options[$data];
    }


}
