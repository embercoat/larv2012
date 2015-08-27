<table>
	<thead>
		<tr>
			<th style="width: 180px;">Namn</th>
			<th style="width: 280px;">Program</th>
			<th style="width: 50px;">Detaljer</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$lastuser = 0;
		 foreach($users as $u){
		 	if($u['user_id'] != $lastuser){
		 		$lastuser = $u['user_id'];
		?>
		<tr class="<?php echo
		 ((isset($selected[$u['user_id']]) && $selected[$u['user_id']] == 1) 
		 	? 'ps_firsthand' 
		 	: ((isset($selected[$u['user_id']]) && $selected[$u['user_id']] == 2) 
		 		? 'ps_secondhand' 
		 		: ''));
		?>">
			<td><?php echo $u['fname'].' '.$u['lname']; ?></td>
			<td><?php echo $programs[$u['programId']]; ?></td>
			<td><a href="/katalog/cvbasen/details/<?php echo $u['user_id']; ?>">detaljer</a></td>
		</tr>
		<?php
		    }
	    } ?>
	</tbody>
</table>
