<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Anggota;
use app\models\Buku;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_buku')->widget(Select2::classname(), [
        'data' => Buku::getList(),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'id_anggota')->widget(Select2::classname(), [
        'data' => Anggota::getList(),
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);?>
    <?= $form->field($model, 'tanggal_pinjam')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <?= $form->field($model, 'tanggal_kembali')->widget(
        DatePicker::className(),[
            'inline' => false,
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
