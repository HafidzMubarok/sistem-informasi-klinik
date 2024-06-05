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
		<?php echo $form->dropDownList($model, 'id_provinsi', $provinsiList, array(
			'prompt'=> 'Select Provinsi',
			'ajax' => array(
				'type'=> 'POST',
				'url'=> CController::createUrl('masterWilayah/getKotaByProvinsi'),
				'data' => array('provinsi_id' => 'js:this.value'),
				'update' => '#MasterWilayah_id_kota',
				'success' => 'function(data) {
					console.log("Data kota yang diterima:", data);
					$("#MasterWilayah_id_kota").html(data);
				}',
			),
		)); ?>
        <?php echo $form->error($model,'id_provinsi'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model, 'id_kota'); ?>
		<?php echo $form->dropDownList($model, 'id_kota', $kotaList, array(
			'prompt' => 'Select Kota',
			'ajax' => array(
				'type'=> 'POST',
				'url'=> CController::createUrl('masterWilayah/getKecamatanByKota'),
				'data' => array('kota_id' => 'js:this.value'),
				'update' => '#MasterWilayah_id_kecamatan',
				'success' => 'function(data) {
					console.log("Data kecamatan yang diterima:", data);
					$("#MasterWilayah_id_kecamatan").html(data);
				}',
			),
		)); ?>
		<?php echo $form->error($model, 'id_kota'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_kecamatan'); ?>
        <?php echo $form->dropDownList($model, 'id_kecamatan', $kecamatanList, array(
			'prompt' => 'Select Kecamatan',
			'ajax' => array(
				'type'=> 'POST',
				'url'=> CController::createUrl('masterWilayah/getKelurahanByKecamatan'),
				'data' => array('kecamatan_id' => 'js:this.value'),
				'update' => '#MasterWilayah_id_kelurahan',
				'success' => 'function(data) {
					console.log("Data kelurahan yang diterima:", data);
					$("#MasterWilayah_id_kelurahan").html(data);
				}',
			),
		)); ?>
        <?php echo $form->error($model,'id_kecamatan'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'id_kelurahan'); ?>
        <?php echo $form->dropDownList($model, 'id_kelurahan', $kelurahanList, array('prompt' => 'Select Kelurahan')); ?>
        <?php echo $form->error($model,'id_kelurahan'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->