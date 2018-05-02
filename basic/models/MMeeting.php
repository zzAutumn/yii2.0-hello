<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
 * @property MeetingTime[] $mMeetingTimes
 * @property Participant[] $mParticipants
 */
class MMeeting extends \yii\db\ActiveRecord
{
    const TYPE_OTHER = 0;
    const TYPE_GROUP_MEETING = 10;

    const STATUS_PLANNING =0;
    const STATUS_CONFIRMED = 20;
    const STATUS_COMPLETED = 40;
    const STATUS_CANCELED = 60;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_meeting';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'message'], 'required'],
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
    public function getMeetingLogs()
    {
        return $this->hasMany(MMeetingLog::className(), ['meeting_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetingNotes()
    {
        return $this->hasMany(MeetingNote::className(), ['meeting_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetingPlaces()
    {
        return $this->hasMany(MeetingPlace::className(), ['meeting_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMMeetingTimes()
    {
        return $this->hasMany(MeetingTime::className(), ['meeting_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMParticipants()
    {
        return $this->hasMany(Participant::className(), ['meeting_id' => 'id']);
    }

    public function getMeetingType($data) {
        $options = $this->getMeetingTypeOptions();
        if (!isset($options[$data])) {
            $data = self::TYPE_OTHER;
        }
        return $options[$data];
    }

    public function getMeetingTypeOptions()
    {
        return array(
            self::TYPE_GROUP_MEETING => 'Group meeting',
            self::TYPE_OTHER => 'Other',
        );
    }

    public function getMeetingTitle($meeting_id) {
        $meeting = MMeeting::find()->where(['id' => $meeting_id])->one();
        $title = $this->getMeetingType($meeting->meeting_type);
        $title.=' Meeting';
        return $title;
    }

    public function canFinalize()
    {
        // check if meeting can be finalized by viewer
        if ($this->canSend()) {
            // organizer can always finalize
            if ($this->viewer == MMeeting::VIEWER_ORGANIZER) {
                $this->isReadyToFinalize = true;
            } else {
                // viewer is a participant
                // has participant responded to one time or is there only one time
                // has participant responded to one place or is there only one place

            }
        }
    }


    public function prepareView() {
        $this->setViewer();
        $this->canSend();
        $this->canFinalize();
        // has invitation been sent
        if ($this->canSend()) {
            Yii::$app->session->setFlash('warning', 'This invitation has not yet been sent.');
        }
        // to do - if sent, has invitation been opened
        // to do - if not finalized, is it within 72 hrs, 48 hrs
    }


}
