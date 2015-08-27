<?
$alternator = 0; ?>
<a href="#" onclick="addRoom()">Add Room</a>
<table>
	<thead>
		<tr>
			<td style="width: 100px;">Room</td>
			<td style="width: 100px;">Actions</td>
		</tr>
	</thead>
	<tbody>
<?  foreach($rooms as $r){  ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td id="room_<?=$r['room_id'] ?>"><?=$r['name'] ?></td>
			<td>
				<a href="/admin/ps/delRoom/<?=$r['room_id'].'/'; ?>">
					Radera
				</a>
				<a href="#" onclick="editRoom(<?=$r['room_id']; ?>)">
					Edit
				</a>
			</td>
		</tr>
<? } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/ps/editRoom/" method="post">
		<?= Form::hidden('room_id', ''); ?>
		<?= Form::label('newname', 'Room'); ?>
		<?= Form::input('newname', ''); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>