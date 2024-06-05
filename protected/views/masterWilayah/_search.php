<?php
/* @var $this MasterWilayahController */
/* @var $model MasterWilayah */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_provinsi'); ?>
		<?php echo $form->textField($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kota'); ?>
		<?php echo $form->textField($model,'id_kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kecamatan'); ?>
		<?php echo $form->textField($model,'id_kecamatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kelurahan'); ?>
		<?php echo $form->textField($model,'id_kelurahan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->