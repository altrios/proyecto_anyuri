<h1>Crear Nueva Noticia</h1>
<?php 
if(Yii::app()->user->hasFlash('mensaje'))
{
    ?>
    <h3 style="color: green;"><?php echo Yii::app()->user->getFlash('mensaje')?></h3>
    <?php    
} ?>
<p>
<?php echo CHtml::link("Volver Atrás",Yii::app()->request->baseUrl."/db",array("title"=>"Volver Atrás","id"=>"enlace"));?>
</p>
<?php echo CHtml::beginForm('','post',array("name"=>"form","id"=>"form","enctype"=>"multipart/form-data"));?>

<?php //echo CHtml::errorSummary($model); ?>
    
     
    <p>
        Foto ( Sólo JPG )
        <?php
        echo CHtml::activeFileField($model,"foto");
        ?>
    </p>
    <p>
     <?php echo CHtml::submitButton('submit',array("class"=>"aer","value"=>"Enviar","title"=>"Enviar")); ?>
    </p>
    
    

<?php echo CHtml::endForm();?>