<?php
/* @var $this CarritoController */
/* @var $model Carrito */

$this->breadcrumbs=array(
	'Carritos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Carrito', 'url'=>array('index')),
	array('label'=>'Create Carrito', 'url'=>array('create')),
	array('label'=>'View Carrito', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Carrito', 'url'=>array('admin')),
);
?>

<h1>Update Carrito <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>