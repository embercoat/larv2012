<a href="/admin/export/ps">Exportera</a>
<table>
	<thead>
		<tr>
			<th style="width: 180px;">Företag</th>
			<th style="width: 280px;">Namn</th>
			<th style="width: 100px;">Prioritet</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($users as $u){ ?>
		
		<tr>
			<td><?php echo $u['name']; ?></td>
			<td><?php echo $u['fname'].' '.$u['lname']; ?></td>
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
		</tr>
		<?php } ?>
	</tbody>
</table>
