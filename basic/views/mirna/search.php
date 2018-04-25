<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/26
 * Time: 上午9:55
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<form action="browse.php" enctype="multipart/form-data" method="post">
    <input type="text" name="test1">
    <input type="button" value="submit">
</form>

<?php
echo Url::to(['mirna/browse']);


