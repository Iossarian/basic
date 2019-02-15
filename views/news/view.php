<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <hr>
        <?php if (isset($model->image)) { ?>
            <div class="post-image img-rounded">
                <img STYLE="width: 100%" src="../<?=$model->image?>" alt="картинка">
            </div>
        <?php } ?>
        <?=$model->text;?>
        <hr>
        <div class="row">
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


            <div class="col-xs-6">
                <time class="timeago badge" datetime="<?=$model->date;?>"></time>
            </div>
        </div>
    </div>
</div>