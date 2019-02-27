<?php

/* @var $model \app\models\News */

use yii\helpers\Url;
use yii\bootstrap\Html;
use app\models\User;

?>

<div class="align">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2 class="truncate text-center"><?=Html::a($model->title, ['news/view', 'color: red;', 'id' => $model->id])?></h2>
                <hr>
                <?php if (isset($model->image)) { ?>
                    <div class="post-image img-rounded">

                        <?=  Html::a(Html::img('../'. $model->image), '../'. $model->image, ['rel' => 'fancybox', 'width: 100%']);?>
                    </div>
                <?php } ?>
                <hr>
                <p><?=$model->text;?></p>
                <hr>
                <div class="text-right">
                    <p><?=$model->category->title;?></p>
                    <p><span class="badge"><?= Yii::$app->formatter->asRelativeTime($model->date)?></span></p>
                </div>
                <?php echo \chiliec\vote\widgets\Vote::widget([
                    'model' => $model,
                ]); ?>
            </div>
        </div>
    </div>
</div>
<?php
echo newerton\fancybox\FancyBox::widget([
    'target' => 'a[rel=fancybox]',
    'helpers' => true,
    'mouse' => true,
    'config' => [
        'maxWidth' => '50%',
        'maxHeight' => '70%',
        'playSpeed' => 7000,
        'padding' => 0,
        'fitToView' => false,
        'width' => '100%',
        'height' => '100%',
        'autoSize' => false,
        'closeClick' => false,
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        'prevEffect' => 'elastic',
        'nextEffect' => 'elastic',
        'closeBtn' => false,
        'openOpacity' => true,
        'helpers' => [
            'title' => ['type' => 'float'],
            'buttons' => [],
            'thumbs' => ['width' => 100, 'height' => 50],
            'overlay' => [
                'css' => [
                    'background' => 'rgba(0, 0, 0, 0.8)'
                ]
            ]
        ],
    ]
]); ?>