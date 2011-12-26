<h1>Markera städer</h1>
<?php
    echo Form::open('/admin/fixdb/locationsStage3');
    $alternator = 0; 
?>
<table>
	<thead>
		<tr>
			<th>Stad</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($cities as $c){ ?>
			<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
				<td><?=$c; ?></td>
				<td><?php echo Form::checkbox('city[]', $c); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php 
echo Form::submit('submit', 'Skicka')
    .Form::close();
?>