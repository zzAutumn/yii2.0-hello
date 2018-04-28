<?php

namespace app\models;

use Yii;

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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'info', 'details', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'contact_type', 'status', 'created_at', 'updated_at'], 'integer'],
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
}