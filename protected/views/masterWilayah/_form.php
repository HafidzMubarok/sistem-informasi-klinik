<?php
/* @var $this MasterWilayahController */
/* @var $model MasterWilayah */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'master-wilayah-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'id_provinsi'); ?>
        <?php echo $form->dropDownList($model, 'id_provinsi', $provinsiList); ?>
        <?php echo $form->error($model,'id_provinsi'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_kota'); ?>
        <?php echo $form->dropDownList($model, 'id_kota', $kotaList); ?>
        <?php echo $form->error($model,'id_kota'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_kecamatan'); ?>
        <?php echo $form->dropDownList($model, 'id_kecamatan', $kecamatanList); ?>
        <?php echo $form->error($model,'id_kecamatan'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_kelurahan'); ?>
        <?php echo $form->dropDownList($model, 'id_kelurahan', $kelurahanList); ?>
        <?php echo $form->error($model,'id_kelurahan'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->