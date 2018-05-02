<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/5/2
 * Time: 下午3:19
 */
namespace app\commands;

use yii\console\Controller;

class SendEmailController extends Controller
{
    public function actionIndex()
    {
        echo "send email\n";
    }
}