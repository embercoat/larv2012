<table>
	<thead>
		<tr>
			<th style="width: 180px;">Namn</th>
			<th style="width: 280px;">Program</th>
			<th style="width: 100px;">Prioritet</th>
			<th style="width: 50px;">Detaljer</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u){
		     ?>
		<tr class="<?php echo ($u['company_request'] == 1 ? 'ps_firsthand' : ($u['company_request'] == 2 ? 'ps_secondhand' : '')); ?>">
			<td><?php echo $u['fname'].' '.$u['lname']; ?></td>
			<td><?php echo $programs[$u['programId']]; ?></td>
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
			<td><a href="/katalog/cvbasen/details/<?php echo $u['user_id']; ?>">detaljer</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
