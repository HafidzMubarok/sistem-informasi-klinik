<?php
/* @var $this MasterWilayahController */
/* @var $model MasterWilayah */

$this->breadcrumbs=array(
	'Master Wilayahs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterWilayah', 'url'=>array('index')),
	array('label'=>'Create MasterWilayah', 'url'=>array('create')),
	array('label'=>'Update MasterWilayah', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterWilayah', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterWilayah', 'url'=>array('admin')),
);
?>

<h1>View MasterWilayah #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
            'name' => 'id_provinsi',
            'value' => $model->provinsi->name,
        ),
        array(
            'name' => 'id_kota',
            'value' => $model->kota->name,
        ),
        array(
            'name' => 'id_kecamatan',
            'value' => $model->kecamatan->name,
        ),
        array(
            'name' => 'id_kelurahan',
            'value' => $model->kelurahan->name,
        ),
	),
)); ?>
