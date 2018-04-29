<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting_place_choice".
 *
 * @property int $id
 * @property int $meeting_place_id
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MeetingPlace $meetingPlace
 * @property User $user
 */
class MeetingPlaceChoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_place_choice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_place_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['meeting_place_id', 'user_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['meeting_place_id'], 'exist', 'skipOnError' => true, 'targetClass' => MeetingPlace::className(), 'targetAttribute' => ['meeting_place_id' => 'id']],
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
            'meeting_place_id' => 'Meeting Place ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetingPlace()
    {
        return $this->hasOne(MeetingPlace::className(), ['id' => 'meeting_place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
