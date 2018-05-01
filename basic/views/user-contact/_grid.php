<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/4/30
 * Time: 下午3:28
 */

use yii\helpers\Html;
use yii\grid\GridView;
?>
    <p></p>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
       [
           'label' => 'Contact Type',
           'attribute' => 'contact_type',
           'format' => 'raw',
           'value' => function($model){
                return '<div>'.$model->getUserContactType($model->contact_type).' '.'</div>';
           }
       ],
        'info',
        [
            'attribute' => 'user_id',
            'value' => 'user.username',  //通过外键约束
        ],
         'user.username',           //通过外键约束
        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>