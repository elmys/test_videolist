<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Playlist */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Плейлист', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'url:url',
            [
                'format' => 'raw',
                'attribute'=>'содержимое',
                'value' => $model->videoCode,
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
