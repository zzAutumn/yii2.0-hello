<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_meeting_log".
 *
 * @property int $id
 * @property int $meeting_id
 * @property int $action
 * @property int $actor_id
 * @property int $item_id
 * @property int $extra_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $actor
 * @property MMeeting $meeting
 */
class MMeetingLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_meeting_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meeting_id', 'action', 'actor_id', 'item_id', 'extra_id', 'created_at', 'updated_at'], 'required'],
            [['meeting_id', 'action', 'actor_id', 'item_id', 'extra_id', 'created_at', 'updated_at'], 'integer'],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['actor_id' => 'id']],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => MMeeting::className(), 'targetAttribute' => ['meeting_id' => 'id']],
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
            'action' => 'Action',
            'actor_id' => 'Actor ID',
            'item_id' => 'Item ID',
            'extra_id' => 'Extra ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(User::className(), ['id' => 'actor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeeting()
    {
        return $this->hasOne(MMeeting::className(), ['id' => 'meeting_id']);
    }
}
