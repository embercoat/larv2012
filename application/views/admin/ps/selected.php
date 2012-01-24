<? $alternator = 0; ?>
<script type="text/javascript">
$(document).ready(function(){
	$('#selectedTable').dataTable({
		 "bPaginate": false,
		 "bFilter": true
	});
});
</script>
<a href="/admin/export/ps">Exportera</a>
<table id="selectedTable">
	<thead>
		<tr>
			<th style="width: 180px;">Företag</th>
			<th style="width: 200px;">Förnamn</th>
			<th style="width: 200px;">Efternamn</th>
			<th style="width: 100px;">Prioritet</th>
			<th style="width: 150px;">Rum</th>
			<th style="width: 100px;">Tid</th>
			<th style="width: 100px;">Edit</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u){ ?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td><?php echo $u['name']; ?></td>
			<td><?php echo $u['fname']; ?></td>
			<td><?php echo $u['lname']; ?></td>
			<td><?php 
			    switch($u['company_request']) {
			        case 1: {
			            echo "Förstahand";
			            break;
			        }
			        case 2: {
			            echo "Reserv";
			            break;
			        }
			    }
			 ?></td>
			<td><?php echo (!empty($u['room']) ? $rooms[$u['room']] : ''); ?></td>
			<td><?php echo (!empty($u['period']) ? $periods[$u['period']] : ''); ?></td>
			<td><a href="#" onclick="editInterview('<?=$u['user_id']; ?>','<?=$u['company']; ?>','<?=$u['room']; ?>','<?=$u['period']; ?>')">Edit</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/ps/editInterview/" method="post">
		<?= Form::hidden('user_id', ''); ?>
		<?= Form::hidden('company_id', ''); ?>
		<?= Form::label('newroom', 'Rum'); ?>
		<?= Form::select('newroom',$rooms); ?>
		<?= Form::label('newperiod', 'Pass'); ?>
		<?= Form::select('newperiod',$periods); ?>
		<?= Form::submit('save', 'Spara'); ?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>