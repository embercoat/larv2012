<h1>Gods <?=$company['org_name']; ?></h1>
<table>
	<thead>
		<tr>
			<th style="width: 150px;">Fält</th>
			<th style="width: 150px;">Data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Skickas gods till mässans godsmottagning inför mässan?</td>
			<td><?=$company['goods_to_fair'];?></td>
		</tr>
		<tr>
			<td>Om Ja, Antal Kollin</td>
			<td><?=$company['goods_packages'];?></td>
		</tr>
		<tr>
			<td>Antal Kollin från mässan</td>
			<td><?=$company['goods_from_fair_packages'];?></td>
		</tr>
		<tr>
			<td>Antal Pallar från mässan</td>
			<td><?=$company['goods_from_fair_pallets'];?></td>
		</tr>
		<tr>
			<td>Gods Från Mässan</td>
			<td><?=$company['goods_from_fair_larv'];?></td>
		</tr>
		<tr>
			<td>Om Ja till annan adress: Ange Adress</td>
			<td><?=$company['goods_from_fair'];?></td>
		</tr>
		
		<tr>
			<td>Detaljer Gods</td>
			<td><?=$company['goods_details'];?></td>
		</tr>
	</tbody>
</table>
  