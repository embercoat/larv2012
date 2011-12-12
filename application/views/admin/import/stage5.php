<?php 
//var_dump($lines);
$alternator = 0; 
echo Form::open('/admin/import/stage6')
	.Form::hidden('filename', $filename)
	.Form::hidden('carryOn', $carryOn);
?>
<table>
	<thead>
		<tr>
			<th>Företag</th>
			<th>Importera</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($lines as $key => $line){ ?>
		<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
			<td><?php echo $line[20]; ?></td>
			<td><?php echo Form::checkbox('import[]', $key, true); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php
	echo Form::submit('submit', 'Skicka')
		.Form::close();
?>