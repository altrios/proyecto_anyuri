<?php
/* @var $this CategoriasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categorias',
);

$this->menu=array(
	array('label'=>'Create Categorias', 'url'=>array('create')),
	array('label'=>'Manage Categorias', 'url'=>array('admin')),
);
?>

<h1>Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
