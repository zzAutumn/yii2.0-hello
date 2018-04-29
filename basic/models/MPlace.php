<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_place".
 *
 * @property int $id
 * @property string $name
 * @property int $place_type
 * @property int $status
 * @property string $google_place_id
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 */
class MPlace extends \yii\db\ActiveRecord
{
    const TYPE_1 = 1;
    const TYPE_2 = 2;
    const TYPE_3 = 3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'google_place_id', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['place_type', 'status', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'google_place_id'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'place_type' => 'Place Type',
            'status' => 'Status',
            'google_place_id' => 'Google Place ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
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
