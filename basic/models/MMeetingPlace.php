<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_meeting_place".
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $place_id
 * @property int $suggested_by
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MMeeting $meeting
 * @property MPlace $place
 * @property User $suggestedBy
 */
class MMeetingPlace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_meeting_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id', 'place_id', 'suggested_by'], 'required'],
            [['meeting_id', 'place_id', 'suggested_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => MMeeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => MPlace::className(), 'targetAttribute' => ['place_id' => 'id']],
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
            'place_id' => 'Place ID',
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
    public function getPlace()
    {
        return $this->hasOne(MPlace::className(), ['id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuggestedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'suggested_by']);
    }
}
