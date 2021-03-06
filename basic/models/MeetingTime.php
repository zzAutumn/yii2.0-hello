<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_meeting_time".
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $start
 * @property int $suggested_by
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MMeeting $meeting
 * @property User $suggestedBy
 */
class MeetingTime extends \yii\db\ActiveRecord
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id'], 'required'],
            [['status'],'string'],
            [['meeting_id', 'suggested_by','created_at', 'updated_at'], 'integer'],
            [['start'], 'unique', 'targetAttribute' => ['start','meeting_id'], 'message'=>'This date and time has already been suggested.'],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => MMeeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
            [['suggested_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['suggested_by' => 'id']],
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
            'start' => 'Start',
            'suggested_by' => 'Suggested By',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
    public function getSuggestedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'suggested_by']);
    }
}
