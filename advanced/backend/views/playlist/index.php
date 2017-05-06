<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\PlaylistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\backend\assets\VideoSorting::register($this);


$this->title = 'Плейлист ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <? echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_listItem',
    ]);
        ?>
<br>
<br>
<br>
    <p>
        <?= Html::a('Добавить', ['#'], ['class' => 'btn-create btn btn-success']) ?>
    </p>

</div>

<div class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 665px; height: 360px;">
        <div class="modal-content" style="padding: 1rem;"></div>
    </div>
</div>

<div class="modal fade preview-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 665px; height: 360px;">
        <div class="modal-content" style="padding: 1rem;"></div>
    </div>
</div>