<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Penulis */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penulis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="penulis-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'alamat:ntext',
            'telepon',
            'email:email',
        ],
    ]) ?>

</div>
<div class="box box-primary">
    <div>&nbsp;</div>
    <h2>Daftar Buku</h2>
    <table class="table">
        <?= Html::a('Tambah Buku', ['buku/create'], ['class' => 'btn btn-round btn-danger']) ?>
        <tr>
            <th>No.</th>
            <th>Nama Buku</th>
            <td>&nbsp;</td>
        </tr>
        <?php $no=1; foreach ($model->findAllBuku() as $buku): ?> 
        <tr>
            <td><?= $no; ?></td>
            <td><?= Html::a($buku->nama, ['buku/view','id'=>$buku->id]); ?></td>
            <td><?= Html::a("Edit", ["buku/update","id"=>$buku->id], ['class' => 'btn btn-primary']); ?> &nbsp;</td>
            <td><?= Html::a("Delete", ["buku/delete","id"=>$buku->id], ['class' => 'btn btn-primary'], ['data-method' => 'post', 'data-confirm' => 'file akan dihapus?']); ?> &nbsp;</td>
        </tr>
        <?php $no++; endforeach ?>
    </table>
</div>
