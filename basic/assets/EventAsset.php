<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/30
 * Time: 下午10:14
 */
namespace app\assets;

use yii\web\AssetBundle;

class EventAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];
    public $js = [
        'js/event.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}