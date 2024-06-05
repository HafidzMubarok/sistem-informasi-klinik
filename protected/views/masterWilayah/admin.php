<?php
/* @var $this MasterWilayahController */
/* @var $model MasterWilayah */

$this->breadcrumbs=array(
	'Master Wilayahs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MasterWilayah', 'url'=>array('index')),
	array('label'=>'Create MasterWilayah', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#master-wilayah-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Master Wilayahs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'master-wilayah-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name' => 'id_provinsi',
            'value' => '$data->provinsi->name',
            'filter' => CHtml::listData(Provinsi::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'id_kota',
            'value' => '$data->kota->name',
            'filter' => CHtml::listData(Kota::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'id_kecamatan',
            'value' => '$data->kecamatan->name',
            'filter' => CHtml::listData(Kecamatan::model()->findAll(), 'id', 'name'),
        ),
        array(
            'name' => 'id_kelurahan',
            'value' => '$data->kelurahan->name',
            'filter' => CHtml::listData(Kelurahan::model()->findAll(), 'id', 'name'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
