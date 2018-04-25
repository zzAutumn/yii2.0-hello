<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/23
 * Time: 上午8:07
 */
//use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
//AppAsset::register($this);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
    <?= Html::cssFile('@web/css/mirna/mirna.css') ?>
    <?= Html::cssFile('@web/css/bootstrap.css') ?>
    <?= Html::jsFile('@web/js/jquery.js') ?>
</head>
<body>
    <div class="main-wrapper">
        <div class="header">
            <h1>PmiRExAt</h1>
            <ul class="header-ul">
                <li><a href="<?= Url::to(['mirna/about']) ?>">About</a></li>
                <li><a href="<?= Url::to(['mirna/relatedData']) ?>">Related Data</a></li>
                <li><a href="<?= Url::to(['mirna/browse']) ?>">Browse</a></li>
                <li><a href="<?= Url::to(['mirna/search']) ?>">Search</a></li>
                <li><a href="<?= Url::to(['mirna/customSearch']) ?>">Custom Search</a></li>
                <li><a href="<?= Url::to(['mirna/download']) ?>">Download</a></li>
                <li><a href="<?= Url::to(['mirna/pmirexat']) ?>">PmiRExAt API</a></li>
                <li><a href="<?= Url::to(['mirna/contact']) ?>">Contact Us</a></li>
                <li><a href="<?= Url::to(['mirna/support']) ?>">Support</a></li>
            </ul>
        </div>

        <?= $content ?>
    </div>



    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Website <?= date('Y') ?></p>
        </div>
    </footer>



</body>
</html>

