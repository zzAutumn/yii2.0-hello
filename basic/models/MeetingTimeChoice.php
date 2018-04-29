<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting_time_choice".
 *
 * @property int $id
 * @property int $meeting_time_id
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MeetingTime $meetingTime
 * @property User $user
 */
class MeetingTimeChoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_time_choice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_time_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['meeting_time_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['meeting_time_id'], 'exist', 'skipOnError' => true, 'targetClass' => MeetingTime::className(), 'targetAttribute' => ['meeting_time_id' => 'id']],
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
            'meeting_time_id' => 'Meeting Time ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetingTime()
    {
        return $this->hasOne(MeetingTime::className(), ['id' => 'meeting_time_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
