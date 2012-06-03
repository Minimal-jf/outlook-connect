<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>

<h1>Register</h1>

<p>Enter your details to register</p>

<div class="form">
<?php $regform=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <div class="row">
		<?php echo $regform->labelEx($regmodel,'firstname'); ?>
		<?php echo $regform->textField($regmodel,'firstname'); ?>
		<?php echo $regform->error($regmodel,'firstname'); ?>
	</div>

	
	<div class="row">
		<?php echo $regform->labelEx($regmodel,'surname'); ?>
		<?php echo $regform->textField($regmodel,'surname'); ?>
		<?php echo $regform->error($regmodel,'surname'); ?>
	</div>
		
	<div class="row">
		<?php echo $regform->labelEx($regmodel,'knownas'); ?>
		<?php echo $regform->textField($regmodel,'knownas'); ?>
		<?php echo $regform->error($regmodel,'knownas'); ?>
	</div>

	<div class="row">
		<?php echo $regform->labelEx($regmodel,'name'); ?>
		<?php echo $regform->textField($regmodel,'name'); ?>
		<?php echo $regform->error($regmodel,'name'); ?>
	</div>

	<div class="row">
		<?php echo $regform->labelEx($regmodel,'password'); ?>
		<?php echo $regform->passwordField($regmodel,'password'); ?>
		<?php echo $regform->error($regmodel,'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $regform->labelEx($regmodel,'email'); ?>
		<?php echo $regform->textField($regmodel,'email'); ?>
		<?php echo $regform->error($regmodel,'email'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Register'); ?>
	</div>
	
<?php $this->endWidget(); ?>