<h1>Företag: <?=count($companies); ?>st</h1>
<table>
	<thead>
		<tr>
			<th style="width: 300px">Företag</th>
			<th style="width: 100px">Event</th>
			<th style="width: 120px">Personliga samtal</th>
			<th style="width: 60px" >Gods</th>
			<th style="width: 100px">Monter</th>
			<th style="width: 100px">Katalog</th>
			<th style="width: 100px">Filer</th>
			<th style="width: 100px">Städer</th>
			<th style="width: 100px">Länder</th>
			<th style="width: 100px">Brancher</th>
			<th style="width: 100px">Utbildningstyper</th>
			<th style="width: 100px">Erbjuder</th>
			<th style="width: 100px">Program</th>
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
			<td><a href="/admin/company/cities/<?=$c['company_id']; ?>">Städer</a></td>
			<td><a href="/admin/company/countries/<?=$c['company_id']; ?>">Länder</a></td>
			<td><a href="/admin/company/branches/<?=$c['company_id']; ?>">Brancher</a></td>
			<td><a href="/admin/company/educationtypes/<?=$c['company_id']; ?>">Utbildningstyper</a></td>
			<td><a href="/admin/company/offers/<?=$c['company_id']; ?>">Erbjuder</a></td>
			<td><a href="/admin/company/programs/<?=$c['company_id']; ?>">Program</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>