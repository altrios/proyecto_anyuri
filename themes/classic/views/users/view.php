
<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(

	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(

	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'htmlOptions'=>array("class"=>"table table-striped"),
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
	),
)); ?>
<?php $this->renderPartial("_roles",array("role"=>$role,"model"=>$model));?>

