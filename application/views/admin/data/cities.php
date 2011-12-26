<?
$alternator = 0; ?>
<a href="#" onclick="addCity()">Add City</a>
<table>
	<thead>
		<tr>
			<td style="width: 100px;">City</td>
			<td style="width: 100px;">Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($cities as $c){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="city_<?=$c['id'] ?>"><?=$c['name'] ?></td>
			<td>
				<a href="/admin/data/delCity/<?=$c['id'].'/'; ?>">
					Radera
				</a>
				<a href="#" onclick="editCity(<?=$c['id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/data/editCity/" method="post">
		<?= Form::hidden('city_id', ''); ?>
		<?= Form::label('newname', 'Namn'); ?>
		<?= Form::input('newname', ''); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>