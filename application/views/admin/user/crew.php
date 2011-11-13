<table>
	<thead>
		<tr>
			<th style="width: 100px;">Förnamn</th>
			<th style="width: 100px;">Efternamn</th>
			<th style="width: 100px;">Roll</th>
			<th style="width: 160px;">Epost</th>
			<th style="width: 150px;">Datum</th>
			<th style="width: 100px;">Detaljer</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$alternator = 0;
			foreach($crew as $c){
		?>
		<tr <?=(++$alternator%2 == 0) ? 'style="background-color: silver"' : '' ?>>
			<td><?php echo $c['fname']; ?></td>
			<td><?php echo $c['lname']; ?></td>
			<td><?php echo $c['role']; ?></td>
			<td><?php echo $c['email']; ?></td>
			<td><?php echo date('Y-m-d h:i:s', $c['date']); ?></td>
			<td><a href="/admin/user/crewDetail/<?php echo $c['id']; ?>/">Details</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>