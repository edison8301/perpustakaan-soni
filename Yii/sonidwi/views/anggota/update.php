<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = 'Update Anggota: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-update">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Update Anggota</h2>
        </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
