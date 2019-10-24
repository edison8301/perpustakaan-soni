<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


\yii\web\YiiAsset::register($this);
?>
<div class="anggota-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'nama',
            'alamat',
            'telepon',
            'email:email',
            'status_aktif',
        ],
    ]) ?>

</div>
