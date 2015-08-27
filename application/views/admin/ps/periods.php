<?
$alternator = 0; ?>
<a href="#" onclick="addPeriod()">Add Period</a>
<table>
	<thead>
		<tr>
			<td style="width: 100px;">Start</td>
			<td style="width: 100px;">End</td>
			<td style="width: 100px;">Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($periods as $p){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="start_<?=$p['period_id'] ?>"><?=$p['start'] ?></td>
			<td id="end_<?=$p['period_id'] ?>"><?=$p['end'] ?></td>
			<td>
				<a href="/admin/ps/delPeriod/<?=$p['period_id'].'/'; ?>">
					Radera
				</a>
				<a href="#" onclick="editPeriod(<?=$p['period_id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/ps/editPeriod/" method="post">
		<?= Form::hidden('period_id', ''); ?>
		<?= Form::label('newstart', 'Start'); ?>
		<?= Form::input('newstart', ''); ?>
		<?= Form::label('newend', 'End'); ?>
		<?= Form::input('newend', ''); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>