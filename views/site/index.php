<?php

/* @var $this yii\web\View */
/* @var $dt_articles yii\data\ActiveDataProvider */

$this->title = 'My First Yii Blog';
?>
<div class="container">
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dt_articles,
        'itemView' => '_news',
        'layout' => '<div class="row">{items}</div><div class="text-center">{pager}</div>',
    ])
    ?>

</div>
