<table>
	<thead>
		<tr>
			<th style="width: 180px;">Namn</th>
			<th style="width: 280px;">Program</th>
			<th style="width: 50px;">Detaljer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u){ ?>
		<tr>
			<td><?php echo $u['fname'].' '.$u['lname']; ?></td>
			<td><?php echo $programs[$u['programId']]; ?></td>
			<td><a href="/katalog/cvbasen/details/<?php echo $u['user_id']; ?>">detaljer</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
