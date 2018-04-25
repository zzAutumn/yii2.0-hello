<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/26
 * Time: 下午1:40
 */
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
class  HelloWidget extends Widget{
    public $message;
    public function init(){
        parent::init();
        if($this->message===null){
            $this->message='Hello World';
        }
    }
    public function run(){
        return Html::encode($this->message);
    }
}
