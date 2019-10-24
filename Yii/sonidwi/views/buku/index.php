<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Peminjaman;
use app\models\Buku;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
<?php if (User::isAdmin()) { ?>
    <p>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel', ['buku/export-excel'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Pdf', ['site/export-pdf'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Pdf sppkl', ['site/export-pdfsppkl'], ['class' => 'btn btn-round btn-danger']) ?>
        
    </p>
<?php } ?>
<?php if (User::isAnggota()) { ?>
    <p>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel', ['buku/export-excel'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Pdf', ['site/export-pdf'], ['class' => 'btn btn-round btn-danger']) ?>
    </p>
<?php } ?>
<?php if (User::isPetugas()) { ?>
    <p>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Excel', ['buku/export-excel'], ['class' => 'btn btn-round btn-danger']) ?>
        <?= Html::a('<i class="fa fa-print"></i> Export Pdf', ['site/export-pdf'], ['class' => 'btn btn-round btn-danger']) ?>
        
    </p>
<?php } ?>
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
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

           // 'id',
            'nama',
            'tahun_terbit',
            [
                'attribute' => 'id_penulis',
                'filter' => Penulis::getList(),
                'value' => function($data)
                {
                  return @$data->penulis->nama;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']

            ],
            [
                'attribute' => 'id_penerbit',
                'filter' => Penerbit::getList(),
                'value' => function($data)
                {
                  return @$data->penerbit->nama;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
          [
                'attribute' => 'id_kategori',
                'filter' => Kategori::getList(),
                'value' => function($data)
                {
                  return @$data->kategori->nama;
                },
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],
            //'sinopsis:ntext',
            
            [
                'attribute' => 'sampul',
                'format' => 'raw',
                'value' => function ($model) {
                  if ($model->sampul != '') {
                    return Html::img('@web/upload/sampul/' . $model->sampul, ['class' => 'img-responsive', 'style' => 'height:100px']);
                  } else {
                    return '<div align="center"><h1>No Image</h1></div>';
                  }
                },
            ],
             [
                'attribute' => 'berkas',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->berkas != '') {
                        return '<a href="' . Yii::$app->homeUrl . '/../Upload/berkas/' . $model->berkas . '"><div align="center"><button class="btn btn-primary glyphicon glyphicon-download-alt" type="submit"></button></div></a>';
                    } else { 
                        return '<div align="center"><h1>No File</h1></div>';
                    }
                },
            ],
            //'berkas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

 
</div>