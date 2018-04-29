<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_participant".
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $participant_id
 * @property int $invited_by
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $invitedBy
 * @property MMeeting $meeting
 * @property User $participant
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id', 'participant_id', 'invited_by', 'created_at', 'updated_at'], 'required'],
            [['meeting_id', 'participant_id', 'invited_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['invited_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['invited_by' => 'id']],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => MMeeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
            [['participant_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['participant_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meeting_id' => 'Meeting ID',
            'participant_id' => 'Participant ID',
            'invited_by' => 'Invited By',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvitedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'invited_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeeting()
    {
        return $this->hasOne(MMeeting::className(), ['id' => 'meeting_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(User::className(), ['id' => 'participant_id']);
    }
}
