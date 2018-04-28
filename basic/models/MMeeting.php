<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_meeting".
 *
 * @property int $id
 * @property int $owner_id
 * @property int $meeting_type
 * @property string $message
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $owner
 * @property MMeetingTime[] $mMeetingTimes
 * @property MParticipant[] $mParticipants
 */
class MMeeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'message', 'created_at', 'updated_at'], 'required'],
            [['owner_id', 'meeting_type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['message'], 'string'],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'meeting_type' => 'Meeting Type',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::className(), ['id' => 'owner_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMMeetingTimes()
    {
        return $this->hasMany(MMeetingTime::className(), ['meeting_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMParticipants()
    {
        return $this->hasMany(MParticipant::className(), ['meeting_id' => 'id']);
    }
}
