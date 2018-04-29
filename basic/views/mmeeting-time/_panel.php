<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/29
 * Time: 上午11:49
 */
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><div class="row"><div class="col-lg-6"><h4><?= Yii::t('frontend','Dates &amp; Times') ?></h4></div><div class="col-lg-6" ><div style="float:right;"><?= Html::a(Yii::t('frontend', ''), ['meeting-time/create', 'meeting_id' => $model->id], ['class' => 'btn btn-primary  glyphicon glyphicon-plus']) ?></div></div></div></div>

    <?php
    if ($timeProvider->count>0):
        ?>
        <!-- Table -->
        <table class="table">
            <thead>
            <tr class="small-header">
                <td></td>
                <td ><?=Yii::t('frontend','You') ?></td>
                <td ><?=Yii::t('frontend','Them') ?></td>
                <td >
                    <?php
                    if ($timeProvider->count>1) echo Yii::t('frontend','Choose');
                    ?>
                </td>
            </tr>
            </thead>
            <?= ListView::widget([
                'dataProvider' => $timeProvider,
                'itemOptions' => ['class' => 'item'],
                'layout' => '{items}',
                'itemView' => '_list',
                'viewParams' => ['timeCount'=>$timeProvider->count],
            ]) ?>
        </table>
    <?php else: ?>
    <?php endif; ?>
</div>