<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
?>
<div class="list-item" id="<?=$model->id ?>">
    <h2><?= Html::a(HtmlPurifier::process($model->title), Url::to(['playlist/view', 'id' => $model->id])) ?></h2>
    <h5><?= Html::a(HtmlPurifier::process($model->url), '#', ['class' => 'video-link', 'videoId' => $model->id]) ?></h5>
    <h6><?= $model->_created_at ?></h6>
    <?= Html::a('редактировать', '#', ['class' => 'btn-edit btn btn-default', 'id' => $model->id]); ?>
    <?= Html::a('удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Удалить?',
            'method' => 'post',
        ],
    ])
    ?>

</div>