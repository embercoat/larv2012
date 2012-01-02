<?
$alternator = 0; ?>
<a href="#" onclick="addBranch()">Add Branch</a>
<table>
	<thead>
		<tr>
			<td style="width: 100px;">Branch</td>
			<td style="width: 100px;">Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($branches as $b){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="branch_<?=$b['branch_id'] ?>"><?=$b['branch'] ?></td>
			<td>
				<a href="/admin/data/delBranch/<?=$b['branch_id'].'/'; ?>">
					Radera
				</a>
				<a href="#" onclick="editBranch(<?=$b['branch_id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/data/editBranch/" method="post">
		<?= Form::hidden('branch_id', ''); ?>
		<?= Form::label('newname', 'Branch'); ?>
		<?= Form::input('newname', ''); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>