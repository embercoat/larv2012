<h1>Markera Länder</h1>
<?php
    echo Form::open('/admin/fixdb/countriesStage3');
    $alternator = 0; 
?>
<table>
	<thead>
		<tr>
			<th>Land</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($countries as $c){ ?>
			<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
				<td><?=$c; ?></td>
				<td><?php echo Form::checkbox('country[]', $c); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php 
echo Form::submit('submit', 'Skicka')
    .Form::close();
?>