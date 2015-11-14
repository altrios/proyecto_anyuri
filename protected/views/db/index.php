<h1>Catalogo</h1>
<p>
<?php echo CHtml::link("Agregar",Yii::app()->request->baseUrl."/db/add",array("title"=>"Agregar","id"=>"enlace"));?>
</p>


<?php 
if(Yii::app()->user->hasFlash('mensaje'))
{
    ?>
    <h3 style="color: green;"><?php echo Yii::app()->user->getFlash('mensaje')?></h3>
    <?php    
} ?>

<ul>
    <?php
    foreach($datos as $dato)
    {
        ?>
        <br>
        <?php echo CHtml::link(CHtml::encode($dato["titulo"]), array('view', 'id'=>$dato["id"],'titulo'=>$dato["titulo"] )); ?>
        <br />
       <img src="<?php echo Yii::app()->request->baseUrl?>/uploads/noticias/<?php echo $dato["foto"]?>" width="100" height="100" />
        
        <?php        
    }
    ?>
</ul>