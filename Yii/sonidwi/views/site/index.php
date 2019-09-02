<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Anggota;
use app\models\Buku;
use app\models\Kategori;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Peminjaman;
use app\models\Petugas;
use dosamigos\highcharts\HighCharts;
use dosamigos\chartjs\ChartJs;
use app\components\Helper;  
/* @var $this yii\web\View */

$this->title = 'Selamat Datang Di Perpustakaan';
?>
<div class="site-index">


    <div class="body-content">

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <div class="icon"><i class="fa fa-group"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Anggota::getAnggotaCount()); ?></div></h3>
              <p>Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/perpustakaan-soni/Yii/sonidwi/web/index.php?r=anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <div class="icon"><i class="fa fa-book"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Buku::getBukuCount()); ?></div></h3>
              <p>Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan-soni/Yii/sonidwi/web/index.php?r=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <div class="icon"><i class="fa fa-shopping-cart"></i></div>
               <h3><div class="count"><?= Yii::$app->formatter->asInteger(Peminjaman::getPeminjamanCount()); ?></div></h3>
              <p>Peminjaman</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="perpustakaan-soni/Yii/sonidwi/web/index.php?r=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <div class="icon"><i class="fa fa-tasks"></i></div>
               <h3><div class="count"><?= Yii::$app->formatter->asInteger(Kategori::getKategoriCount()); ?></div></h3>
              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/perpustakaan-soni/Yii/sonidwi/web/index.php?r=kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
    <div class="body-content">

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <div class="icon"><i class="fa fa-user"></i></div>
         <h3><div class="count"><?= Yii::$app->formatter->asInteger(Penulis::getPenulisCount()); ?></div></h3>
              <p>Penulis</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/perpustakaan-soni/Yii/sonidwi/web/index.php?r=penulis" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <div class="icon"><i class="fa fa-user"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Penerbit::getPenerbitCount()); ?></div></h3>
              <p>Penerbit</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/perpustakaan-soni/Yii/sonidwi/web/index.php?r=penerbit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <div class="icon"><i class="fa fa-user"></i></div>
              <h3><div class="count"><?= Yii::$app->formatter->asInteger(Petugas::getPetugasCount()); ?></div></h3>
              <p>Petugas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="perpustakaan-soni/Yii/sonidwi/web/index.php?r=petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
    </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <h3 class="box-title">Grafik Peminjaman Buku</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- <canvas id="mybarChart"> -->
                        <div class="box-body">
                  <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 600,
                    'width' => 900,
                    'color' => 'red'
                ],
                'data' => [
                    'labels' => Helper::getListBulan(),
                     'datasets' => [
                         [
                             'label'=> 'Peminjaman',
                             'data' => Peminjaman::getGrafikPeminjamanByBulan()
                         ],
                     ]
                ]
            ]);?>
                         
        </div>