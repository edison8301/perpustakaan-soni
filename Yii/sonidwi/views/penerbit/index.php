<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenerbitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penerbits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penerbit-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a('Create Penerbit', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Eksport Excel', ['penerbit/export-excel'], ['class' => 'btn btn-round btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Data Penerbit</h2>
        </div>
    <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            'alamat:ntext',
            'telepon',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
