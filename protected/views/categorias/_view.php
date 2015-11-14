<?php
/* @var $this CategoriasController */
/* @var $data Categorias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctgnombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ctgnombre), array('view', 'id'=>$data->id)); ?>
	<?php echo CHtml::encode($data->ctgnombre); ?>
	<br />


</div>