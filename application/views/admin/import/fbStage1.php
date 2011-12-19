<h1>Länka företag</h1>
<?=Form::open('/admin/import/fbStage2');?>
<table>
	<thead>
		<tr>
			<th>Larvinfo</th>
			<th>Larv.org</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($booths as $id => $b){ ?>
			<tr style="background-color: <?=(array_search(strtolower($b['company']), $companiesLower) !== false ? 'white':'red'); ?>">
				<td><?=$b['company']; ?></td>
				<td><?=Form::select('company['.$id.']', $companies, array_search(strtolower($b['company']), $companiesLower)); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?=Form::submit('submit', 'Skicka'); ?>
<?=Form::close(); ?>