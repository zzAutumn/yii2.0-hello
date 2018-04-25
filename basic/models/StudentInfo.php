<?php
namespace app\models;
use yii\db\ActiveRecord;

class StudentInfo extends ActiveRecord
{
    public function attributes()
    {
        return [
            'id',
            'name',
            'sex',
            'city',
        ];
    }
    public static function studentInfo()
    {
        return 'student_info';
    }

    public function getScore()
    {
        return $this->hasOne(ScoreInfo::className(),['id'=>'stu_id']);
    }
}