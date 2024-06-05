<?php
$this->breadcrumbs=array(
    'Master Wilayah'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List MasterWilayah', 'url'=>array('index')),
    array('label'=>'Manage MasterWilayah', 'url'=>array('admin')),
);
?>

<h1>Create Master Wilayah</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'provinsiList' => $provinsiList,
    'kotaList' => array(),
    'kecamatanList' => array(),
    'kelurahanList' => array(),
)); ?>