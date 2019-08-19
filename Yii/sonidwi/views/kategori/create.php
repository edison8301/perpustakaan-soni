<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kategori */

$this->title = 'Create Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"> Create Kategori</h2>
        </div>
    <div class="box-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
