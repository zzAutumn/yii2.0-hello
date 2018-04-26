<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/26
 * Time: 上午7:53
 */

namespace app\models;

//use yii\base\Model;
use Yii;
use dektrium\user\models\User;
/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $message
 * @property int $permissions
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 *
 * @property User $createdBy
 */


class Status extends \yii\db\ActiveRecord
{
    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;

    public $text;
    public $permissions;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'created_at', 'updated_at','created_by'], 'required'],
            [['message'], 'string'],
            [['permissions', 'created_at', 'updated_at','created_by'], 'integer'],
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
            'message' => 'Message',
            'permissions' => 'Permissions',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    public function getPermissions()
    {
        return array(self::PERMISSIONS_PRIVATE=>'Private',self::PERMISSIONS_PUBLIC=>'Public');
    }

    public function getPermissionsLabel($permissions)
    {
        if ($permissions == self::PERMISSIONS_PUBLIC)
        {
            return 'Public';
        }else{
            return 'Private';
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}