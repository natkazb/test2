<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
?>
<h1><?=$title?></h1>

<p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'emptyText'=>'Пусто',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'holiday',
            'is_weekend',

            //['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</p>
