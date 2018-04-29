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
class MeetingPlace extends \yii\db\ActiveRecord
{
    const TYPE_1 = '新会议室二楼';
    const TYPE_2 = '老会议室二楼';
    const TYPE_3 = '其他';

    //const STATUS_SUGGESTED =0;
    //const STATUS_SELECTED =0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id','place_name'], 'required'],
            [['meeting_id'],'unique'],
            [['place_name'],'string'],
            [['meeting_id', 'place_id', 'suggested_by', 'created_at', 'updated_at'], 'integer'],

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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'place_name' => 'Place Name',
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

    public function getMeetingPlaceTypeOption()
    {
        return array([
            self::TYPE_1 => '新会议室二楼',
            self::TYPE_2 => '老会议室二楼',
            self::TYPE_3 => '其他',
        ]);
    }

    public function getMeetingPlace($num)
    {
        $options = $this->getMeetingPlaceTypeOption();
        if (!isset($options[$num])) {
            $data = self::TYPE_3;
        }
        return $options[$data];

    }
}
