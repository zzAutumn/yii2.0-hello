<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_meeting_note".
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $posted_by
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MMeeting $meeting
 * @property User $postedBy
 */
class MeetingNote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'note'], 'required'],
            //[['meeting_id'],'unique'],
            [['meeting_id', 'posted_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['note'], 'string'],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => MMeeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
            [['posted_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['posted_by' => 'id']],
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
            'posted_by' => 'Posted By',
            'note' => 'Note',
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
    public function getPostedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'posted_by']);
    }
}
