<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Wishes */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wishes'), 'url' => ['index']];
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
        </div>
    </div>
</div>