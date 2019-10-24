<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="buku-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<?php if (User::isAdmin()) { ?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php } ?>
    <?php if (User::isAnggota()) { ?>
    <?php } ?>
        <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Buku</h2>
        </div>
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nama',
            'tahun_terbit',
            [
            'attribute' => 'Penulis',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'value' => function($data){
                return $data->penulis->nama;
            }
            ],
            [
            'attribute' => 'penerbit',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'value' => function($data){
                return $data->penerbit->nama;
            }
            ],
            [
            'attribute' => 'kategori',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'value' => function($data){
                return $data->kategori->nama;
            }
            ],
            //'sinopsis:ntext',
            [
                'attribute' => 'sinopsis',
                'format' => 'raw',
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'label' => 'Sampul',
                'format' => 'raw',
                'value' => function ($model) {
                  if ($model->sampul != '') {
                    return Html::img('@web/upload/sampul/' . $model->sampul, ['class' => 'img-responsive', 'style' => 'height:300px ']);
                  } else {
                    return '<div align="center"><h1>No Image</h1></div>';
                  }
                },
            ],
            'berkas',
        ],
    ]) ?>

</div>
