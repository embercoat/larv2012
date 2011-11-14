<h1>Intresseanmälan</h1>
<table>
	<thead>
		<tr>
			<th style="width: 100px;">Roll</th>
			<th style="width: 400px;">Motivation</th>
		</tr>
	</thead>
	<tbody>
<?php
	$roles = array(
		'ftv'			=> 'Företagsvärd',
		'chauffor'		=> 'Chaufför',
		'massvard'		=> 'Mässvärd',
		'gods'			=> 'Gods',
		'funktionar'	=> 'Funktionär',
		'inredning'		=> 'Inredning'
	);
	foreach($crew as $c){
?>
		<tr>
			<td><?php echo $roles[$c['role']];?></td>
			<td><?php echo $c['motivation'];?></td>
		</tr>
<?php 
	} 
?>
	</tbody>
</table>