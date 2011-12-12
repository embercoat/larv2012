<?php
echo Form::open('/admin/import/stage3/')
	.Form::hidden('filename', $filename); ?>
<table>
<thead>
	<tr>
		<th>Field</th>
		<th style="width: 50px;">Branch</th>
		<th style="width: 50px;">Program</th>
		<th style="width: 50px;">Offers</th>
		<th style="width: 50px;">Ignore</th>
	</tr>
</thead>
<tbody>
	<?php
	$alternator = 0; 
	foreach($index as $key => $field){
	?>
	
		<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?> >
			<td><?=$field;?></td>
			<td><?=Form::checkbox('isBranch[]', $key, (($key >= 81 && $key <= 109) ? true : false));?></td>
			<td><?=Form::checkbox('isProgram[]', $key, (($key >= 125 && $key <= 168) ? true : false));?></td>
			<td><?=Form::checkbox('offers[]', $key, (($key >= 110 && $key <= 119) ? true : false));?></td>
			<td><?=Form::checkbox('ignore[]', $key);?></td>
		</tr>
	<?php 
	} 
	?>
</tbody>
</table>
<?php
	echo Form::submit('submit', 'Skicka')
		.Form::close();
?>