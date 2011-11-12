<?
$alternator = 0; ?>
<a href="#" onclick="addProgram()">Add Program</a>
<table>
	<thead>
		<tr>
			<td>Program</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($programs as $p){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="program_<?=$p['id'] ?>"><?=$p['name'] ?></td>
			<td id="url_<?=$p['id'] ?>"><?=$p['url'] ?></td>
			<td>
				<a href="/admin/data/delProgram/<?=$p['id'].'/'; ?>">
					Radera
				</a>
				<a href="#" onclick="editProgram(<?=$p['id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/data/editProgram/" method="post">
		<?= Form::hidden('program_id', '', array('id' => 'program_id')); ?>
		<?= Form::hidden('oldname', '', array('id' => 'oldname')); ?>
		<?= Form::hidden('oldurl', '', array('id' => 'oldurl')); ?>
		<?= Form::label('newname', 'Namn'); ?>
		<?= Form::input('newname', '', array('id' => 'newname')); ?>
		<?= Form::label('newurl', 'URL'); ?>
		<?= Form::input('newurl', '', array('id' => 'newurl')); ?>
		
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>