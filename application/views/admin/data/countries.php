<?
$alternator = 0; ?>
<a href="#" onclick="addCountry()">Add Country</a>
<table>
	<thead>
		<tr>
			<td style="width: 150px;">Country</td>
			<td style="width: 100px;">Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($countries as $c){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="country_<?=$c['id'] ?>"><?=$c['name'] ?></td>
			<td>
				<a href="/admin/data/delCountry/<?=$c['id'].'/'; ?>" class="delete">
					Radera
				</a>
				<a href="#" onclick="editCountry(<?=$c['id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/data/editCountry/" method="post">
		<?= Form::hidden('country_id', ''); ?>
		<?= Form::label('newname', 'Namn'); ?>
		<?= Form::input('newname', ''); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>