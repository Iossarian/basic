<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use ogheo\comments\widget\Comments;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>




<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <hr>
        <?php if (isset($model->image)) { ?>
            <div class="post-image img-rounded">
                <?=  Html::a(Html::img('../'. $model->image), '../'. $model->image, ['rel' => 'fancybox', 'width: 100%']);?>
            </div>

        <?php } ?>
        <?=$model->text;?>
        <hr>

        <div class="row">
            <?php if (!empty(Yii::$app->user->identity->id)) : ?>
            <?php if (Yii::$app->user->identity->id === $model->author_id) : ?>
            <div class="col-md-4">
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
            <?php endif;?>
            <?php endif;?>


            <div class="col-xs-6">
                <time class="timeago badge" datetime="<?=$model->date;?>"></time>
            </div>
            <br>

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



        </div>
    </div>
</div>