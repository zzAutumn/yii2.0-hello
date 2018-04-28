<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/28
 * Time: 上午8:25
 */
namespace app\assets;
use yii\web\AssetBundle;

class StatusAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
        '/js/jquery.simplyCountable.js',
        '/js/twitter-text.js',
        '/js/twitter_count.js',
        '/js/status-counter.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}