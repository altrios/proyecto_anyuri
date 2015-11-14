<?php
/* @var $this CategoriasController */
/* @var $model Categorias */

$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categorias', 'url'=>array('index')),
	array('label'=>'Create Categorias', 'url'=>array('create')),
	array('label'=>'View Categorias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categorias', 'url'=>array('admin')),
);
?>

<h1>Update Categorias <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>