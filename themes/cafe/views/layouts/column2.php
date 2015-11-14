<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div>
	<div class="row-fluid">
		<div class="span12">
			
			<?php
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'nav nav-tabs'),
				));
			?><?php $this->endContent(); ?>
			
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<?php echo $content; ?>
		</div>
	</div>
</div>
