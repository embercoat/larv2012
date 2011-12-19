<h1>Företag: <?=count($companies); ?>st</h1>
<table>
	<thead>
		<tr>
			<th style="width: 300px";>Företag</th>
			<th style="width: 100px";>Event</th>
			<th style="width: 120px";>Personliga samtal</th>
			<th style="width: 60px";>Gods</th>
			<th style="width: 100px";>Monter</th>
			<th style="width: 100px";>Katalog</th>
			<th style="width: 100px";>Filer</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$alternator = 0;
		foreach($companies as $c){
		?>
		<tr style="height: 30px;<?=(++$alternator%2 == 0) ? 'background-color: silver;' : '' ?>">
			<td><a href="/admin/company/details/<?=$c['company_id']; ?>"><?=$c['name']; ?></a></td>
			<td><a href="/admin/company/detailsEvent/<?=$c['company_id']; ?>">Event</a></td>
			<td><a href="/admin/company/detailsInterview/<?=$c['company_id']; ?>">Personliga Samtal</a></td>
			<td><a href="/admin/company/detailsGoods/<?=$c['company_id']; ?>">Gods</a></td>
			<td><a href="/admin/company/detailsBooth/<?=$c['company_id']; ?>">Monter</a></td>
			<td><a href="/admin/company/detailsCatalogue/<?=$c['company_id']; ?>">Katalog</a></td>
			<td><a href="/admin/company/detailsFile/<?=$c['company_id']; ?>">Filer</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>