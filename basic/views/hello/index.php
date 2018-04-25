<?php
use yii\widgets\LinkPager;

echo $sort->link('energy').'|'.$sort->link('score');
?>

<?php foreach ($data as $item) {
?>
    <ul>
        <li><?= $item["targetName"]?></li>
        <li><?= $item["mirnaName"]?></li>
        <li><?= $item["score"]?></li>
        <li><?= $item["querySeq"]?></li>
        <li><?= $item["refSeq"]?></li>
        <li><?= $item["energy"]?></li>
    </ul>
<?php
}
    echo LinkPager::widget([
        'pagination'=>$pagination,
        'firstPageLabel'=>'首页',
        'lastPageLabel'=>'末页',
    ]);


