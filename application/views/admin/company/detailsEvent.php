<h1>Event: <?=$company['org_name']; ?></h1>
<table>
	<thead>
		<tr>
			<th style="width: 150px;">Fält</th>
			<th style="width: 150px;">Data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Biljetter Kvällen före</td>
			<td><?=$company['event_tickets_evening'];?></td>
		</tr>
		<tr>
			<td>Lunchbiljetter</td>
			<td><?=$company['event_tickets_lunch'];?></td>
		</tr>
		<tr>
			<td>Bankettkuvert</td>
			<td><?=$company['event_tickets_banquet'];?></td>
		</tr>
		<tr>
			<td>Drinkbiljetter</td>
			<td><?=$company['event_tickets_drink'];?></td>
		</tr>
	</tbody>
</table>
  