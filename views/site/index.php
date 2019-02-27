<?php
use yii\bootstrap\Html;
/* @var $this yii\web\View */
/* @var $dt_articles yii\data\ActiveDataProvider */

$this->title = 'My First Yii Blog';
?>
<div class="container">
    <div class="add">
    <?= Html::a('Добавить пожелание', ['/wishes/create'], ['class'=>'btn btn-primary']) ?>
    </div>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dt_articles,
        'itemView' => '_wishes',
        'layout' => '<div class="row">{items}</div><div class="text-center">{pager}</div>',
    ])
    ?>
</div>
