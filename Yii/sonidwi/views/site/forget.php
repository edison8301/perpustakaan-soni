<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Anggota;

$this->title = 'forget password';

$fieldOptions1 = [
	'options' => ['class' => 'form-group has-feedback'],
	'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
	'options' => ['class' => 'form-group has-feedback'],
	'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
	<div class="login-logo">
		<img src="../web/img/polindra.png" style="height: 150px;"><br>
		<h2 style="color: #964B00;">Forget Password</h2>
	</div>
	<div class="login-box-body">
		<?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

		<?= $form 
			->field($model, 'email', $fieldOptions1)
			->label(false)
			->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

			
	<div class="col-xs-4">
		<?= Html::a('Kembali', ['site/login'], ['class' => 'btn btn-success']) ?>
	</div>
	<div class="row">
		<div class="col-xs-4">
			<?= Html::submitButton('Kirim', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
		</div>
	</div>

		<?php ActiveForm::end(); ?>
		
	</div>
</div>