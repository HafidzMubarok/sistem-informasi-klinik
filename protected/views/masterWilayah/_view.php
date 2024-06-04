<?php
/* @var $this MasterWilayahController */
/* @var $data MasterWilayah */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->id_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kota')); ?>:</b>
	<?php echo CHtml::encode($data->id_kota); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kecamatan')); ?>:</b>
	<?php echo CHtml::encode($data->id_kecamatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kelurahan')); ?>:</b>
	<?php echo CHtml::encode($data->id_kelurahan); ?>
	<br />


</div>