<?php
/*use yii\helpers\Html;*/
use \yii\widgets\DetailView;
use yii\widgets\LinkPager;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?= \yii\helpers\Html::cssFile('@web/css/mirna/browse.css') ?>

<?/*= DetailView::widget([
        'table'=>$table,
        'attributes'=>[
            'Accession',
            'ID',
            'Location',
            'Gene',
            'Detail',
        ],
]) */?>


<!--<ul>
    <?php /*foreach ($table as $obj): */?>
        <li>
            <?/*/*= Html::encode("{$obj->ID}") */?>
            <?/*= $obj->Accession */?>
            <?/*= $obj-> ID*/?>
            <?/*= $obj->Location */?>
            <?/*= $obj->Gene */?>
            <?/*= $obj->Detail */?>
        </li>
    <?php /*endforeach; */?>
</ul>

--><?/*= LinkPager::widget(['pagination'=>$pagination]) */?>


<div class="tableShow">

    <table class="table table-striped table-hover">
        <tr>
            <td>Accession</td>
            <td>ID</td>
            <td>Location</td>
            <td>Gene</td>
            <td>Detail</td>
        </tr>
        <?php foreach ($table as $obj): ?>
        <tr>
            <td class="active"><?= $obj->Accession ?></td>
            <td class="success"><?= $obj-> ID ?></td>
            <td class="warning"><?= $obj->Location ?></td>
            <td class="danger"><?= $obj->Gene?></td>
            <td class="info"><a href="result?name=<?= $obj->Accession?>"><?= $obj->Detail?></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="pagination-btn">
    <?= LinkPager::widget(['pagination'=>$pagination]) ?>
</div>

