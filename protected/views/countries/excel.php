<table>
<tr>
	<th>ID</th>
	<th>NAME</th>
	<th>STATUS</th>

</tr>



<?php foreach($model as $data):?>
<tr>
	<th><?php echo$data->id?></th>
	<th><?php echo$data->name?></th>
	<th><?php echo$data->status?></th>

</tr>


<?php endforeach;?>
</table>