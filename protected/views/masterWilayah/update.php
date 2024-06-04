<?php
$this->breadcrumbs=array(
    'Master Wilayah'=>array('index'),
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'List MasterWilayah', 'url'=>array('index')),
    array('label'=>'Create MasterWilayah', 'url'=>array('create')),
    array('label'=>'View MasterWilayah', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Manage MasterWilayah', 'url'=>array('admin')),
);
?>

<h1>Update MasterWilayah <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'provinsiList' => $provinsiList,
    'kotaList' => $kotaList,
    'kecamatanList' => $kecamatanList,
    'kelurahanList' => $kelurahanList,
)); ?>