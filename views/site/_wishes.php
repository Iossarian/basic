<?php

/* @var $model \app\models\News */

use yii\helpers\Url;
use yii\bootstrap\Html;
use app\models\User;
?>

    <div class="align">

        <div class="col-md-7">

            <div class="panel panel-default">

                <div class="panel-body">
                    <h2 class="truncate text-center"><?=Html::a($model->title, ['wishes/view', 'color: red;', 'id' => $model->id])?></h2>
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
                        <p><span class="badge"><?= Yii::$app->formatter->asRelativeTime($model->date)?></span></p>
                    </div>
                    <?php echo \chiliec\vote\widgets\Vote::widget([
                        'model' => $model,
                    ]); ?>

                    <?php echo \yii2mod\comments\widgets\Comment::widget([
                        'model' => $model,
                    ]); ?>



                </div>
            </div>
        </div>
    </div>
