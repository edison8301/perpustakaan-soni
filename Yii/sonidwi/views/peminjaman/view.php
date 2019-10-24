<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = ['label' => 'Peminjamen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="peminjaman-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title">Peminjaman</h2>
        </div>
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            //'id_buku',
            [
            'attribute' => 'buku',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'value' => function($data){
                return $data->buku->nama;
            }
            ],
            //'id_anggota',
            [
            'attribute' => 'anggota',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'value' => function($data){
                return $data->anggota->nama;
            }
            ],
            'tanggal_pinjam',
            'tanggal_kembali',
        ],
    ]) ?>
    

</div>
