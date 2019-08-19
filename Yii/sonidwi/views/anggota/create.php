<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Anggota */

$this->title = 'Create Anggota';
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Create Anggota</h2>
        </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
