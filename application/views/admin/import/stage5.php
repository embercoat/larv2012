<?php 
//var_dump($lines);
$alternator = 0; 
echo Form::open('/admin/import/stage6')
	.Form::hidden('filename', $filename)
	.Form::hidden('carryOn', $carryOn);
?>
Antal företag i listan: <?=count($lines);?>
<table>
	<thead>
		<tr>
			<th>Företag</th>
			<th>Importera</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($lines as $key => $line){
	    $exists = (bool)(arraY_search($line[20], $existingCompanies));
	     ?>
		<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
			<td <?=($exists ? 'style="background-color: red;"':'')?>><?php echo $line[20]; ?></td>
			<td><?php echo Form::checkbox('import[]', $key, !$exists); ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php
	echo Form::submit('submit', 'Skicka')
		.Form::close();
?>