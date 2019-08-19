<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Buku;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Create Buku', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Daftar Buku</h2>
        </div>
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'nama',
            'tahun_terbit',
            [
            'attribute' => 'id_penulis',
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => ['style' => 'text-align:center'],
            'value' => function($data){
                return $data->penulis->nama;
            }
            ],
            [
            'attribute' => 'id_penerbit',
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => ['style' => 'text-align:center'],
            'value' => function($data){
                return $data->penerbit->nama;
            }
            ],
            [
            'attribute' => 'id_kategori',
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => ['style' => 'text-align:center'],
            'value' => function($data){
                return $data->kategori->nama;
            }
            ],
            //'sinopsis:ntext',
            'sampul',
            //'berkas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
