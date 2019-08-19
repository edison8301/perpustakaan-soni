<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Buku */

$this->title = 'Create Buku';
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Create Buku</h2>
        </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
