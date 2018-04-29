<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/29
 * Time: 上午11:41
 */
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-6"><h4>Places</h4></div>
            <div class="col-lg-6" ><div style="float:right;"><?= Html::a('', ['meeting-place/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-plus']) ?></div>
            </div>
        </div>
    </div>

    <?php
    if ($placeProvider->count>0):
        ?>
        <table class="table">
            <thead>
            <tr class="small-header">
                <td></td>
                <td ><?=Yii::t('frontend','You') ?></td>
                <td ><?=Yii::t('frontend','Them') ?></td>
                <td >
                    <?php
                    if ($placeProvider->count>1) echo Yii::t('frontend','Choose');
                    ?>    </tr>
            </thead>
            <?= ListView::widget([
                'dataProvider' => $placeProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '_list',
                'viewParams' => ['placeCount'=>$placeProvider->count],
            ]) ?>
        </table>

    <?php else: ?>
    <?php endif; ?>

</div>