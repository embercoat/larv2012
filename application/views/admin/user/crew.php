<a href="/admin/export/crew/">Exportera</a>
<table>
	<thead>
		<tr>
			<th style="width: 150px;">Förnamn</th>
			<th style="width: 100px;">Efternamn</th>
			<th style="width: 100px;">Roll</th>
			<th style="width: 160px;">Epost</th>
			<th style="width: 220px;">Program</th>
			<th style="width: 160px;">Program Övrigt</th>
			<th style="width: 150px;">Datum</th>
			<th style="width: 100px;">Detaljer</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$programs = user::get_program();
			$alternator = 0;
			foreach($crew as $c){
		?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td><?php echo $c['fname']; ?></td>
			<td><?php echo $c['lname']; ?></td>
			<td><?php echo $c['role']; ?></td>
			<td><?php echo $c['email']; ?></td>
			<td><?php echo $programs[$c['programId']]; ?></td>
			<td><?php echo $c['program_ovrig'];?></td>
			<td><?php echo date('Y-m-d h:i:s', $c['date']); ?></td>
			<td><a href="/admin/user/crewDetail/<?php echo $c['id']; ?>/">Detaljer</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>