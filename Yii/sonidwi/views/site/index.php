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
use app\models\User;
//use dosamigos\highcharts\HighCharts;
use miloschuman\highcharts\Highcharts;
use dosamigos\chartjs\ChartJs;
use app\components\Helper;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

/* @var $this yii\web\View */

$this->title = 'Perpustakaan';
?>
<div style='text-align: center;'><h1><b>Selamat Datang Di Perpustakaan</b></h1></div>
<div class="site-index">

    <?php if (User::isAdmin()) { ?>
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
            <a href="/sonidwi/web/index.php?r=anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/sonidwi/web/index.php?r=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="sonidwi/web/index.php?r=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/sonidwi/web/index.php?r=kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/sonidwi/web/index.php?r=penulis" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="/sonidwi/web/index.php?r=penerbit" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="sonidwi/web/index.php?r=petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
      </div>
    </div>
    <div class="col-sm-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Buku Berdasarkan Penulis</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'PENULIS BUKU'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Penulis',
                                'data' => Penulis::getGrafikList(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if (User::isAnggota()) { ?>
  <div class="body-content">

        <div class="row">
       
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
            <a href="/sonidwi/web/index.php?r=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="sonidwi/web/index.php?r=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
    </div>
    <div class="body-content">

        <div class="row">
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
      </div>
    </div>
     <?=$coord = new LatLng(['lat' => -6.367180, 'lng' => 108.118130]);
$map = new Map([
    'center' => $coord,
    'zoom' => 14,
]);

// lets use the directions renderer
$home = new LatLng(['lat' => -6.367180, 'lng' => 108.118130]);
$school = new LatLng(['lat' => -6.367180, 'lng' => 108.118130]);
$indramayu = new LatLng(['lat' => -6.367180, 'lng' => 108.118130]);

// setup just one waypoint (Google allows a max of 8)
$waypoints = [
    new DirectionsWayPoint(['location' => $indramayu])
];

$directionsRequest = new DirectionsRequest([
    'origin' => $home,
    'destination' => $school,
    'waypoints' => $waypoints,
    'travelMode' => TravelMode::DRIVING
]);

// Lets configure the polyline that renders the direction
$polylineOptions = new PolylineOptions([
    'strokeColor' => '#FFAA00',
    'draggable' => true
]);

// Now the renderer
$directionsRenderer = new DirectionsRenderer([
    'map' => $map->getName(),
    'polylineOptions' => $polylineOptions
]);

// Finally the directions service
$directionsService = new DirectionsService([
    'directionsRenderer' => $directionsRenderer,
    'directionsRequest' => $directionsRequest
]);

// Thats it, append the resulting script to the map
$map->appendScript($directionsService->getJs());

// Lets add a marker now
$marker = new Marker([
    'position' => $coord,
    'title' => 'My Home Town',
]);

// Provide a shared InfoWindow to the marker
$marker->attachInfoWindow(
    new InfoWindow([
        'content' => '<p>This is my super cool content</p>'
    ])
);

// Add marker to the map
$map->addOverlay($marker);

// Now lets write a polygon
$coords = [
    new LatLng(['lat' => 25.774252, 'lng' => -80.190262]),
    new LatLng(['lat' => 18.466465, 'lng' => -66.118292]),
    new LatLng(['lat' => 32.321384, 'lng' => -64.75737]),
    new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
];

$polygon = new Polygon([
    'paths' => $coords
]);

// Add a shared info window
$polygon->attachInfoWindow(new InfoWindow([
        'content' => '<p>This is my super cool Polygon</p>'
    ]));

// Add it now to the map
$map->addOverlay($polygon);


// Lets show the BicyclingLayer :)
$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);

// Append its resulting script
$map->appendScript($bikeLayer->getJs());

// Display the map -finally :)
echo $map->display();?>
</div>
<?php } ?>

<?php if (User::isPetugas()) { ?>
<div class="body-content">

        <div class="row">
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
            <a href="/sonidwi/web/index.php?r=buku" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="sonidwi/web/index.php?r=peminjaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

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
            <a href="sonidwi/web/index.php?r=petugas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
    </div>
    <div class="row">
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
      </div>
    </div>
</div>

    <?php } ?>