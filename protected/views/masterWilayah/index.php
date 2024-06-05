<?php
/* @var $this MasterWilayahController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Wilayahs',
);

$this->menu=array(
	array('label'=>'Create MasterWilayah', 'url'=>array('create')),
	array('label'=>'Manage MasterWilayah', 'url'=>array('admin')),
);
?>

<h1>Master Wilayahs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
