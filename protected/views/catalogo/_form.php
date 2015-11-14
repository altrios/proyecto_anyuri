<?php
/* @var $this CatalogoController */
/* @var $model Catalogo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalogo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'method'=>'post',
    //'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
))); ?>
<?php /*
$form = $this->beginWidget('CMultiFileUpload', array(
    'id'=>'expenses-form',
    'enableAjaxValidation'=>false,
    'method'=>'post',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
     ));*/ ?>  
 
     

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'img'); ?>
		<?php echo $form->fileField($model,'img'); /*$form->textField($model,'img',array('size'=>60,'maxlength'=>255));*/ ?>
		<?php echo $form->error($model,'img'); ?>
		<?php //echo CHtml::image(Yii::app()->controller->createUrl('catalogo/loadImage', array('id'=>$this->model->id)));?>
	</div>

	<div class="row-fluid">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>
<div class="row-fluid">
		<?php echo $form->labelEx($model,'Categoria'); ?>
		<?php echo $form->dropDownList($model,'categoria',CHtml::listData(categorias::model()->findall(),'id','ctgnombre'), array('empty'=>'Seleccione una Categoria')); ?>
		<?php echo $form->error($model,'Categoria'); ?>
	</div>
	<div class="row-fluid buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php if($model->isNewRecord!='1'){ ?>
<div class="row">
     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/../catalogo/'.$model->imagen,"imagen",array("width"=>200)); }?>  // La Imagen se muestra aquí si la página es la página de actualización
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->