<h1>Personliga Samtal <?=$company['org_name']; ?></h1>
<table>
	<thead>
		<tr>
			<th style="width: 150px;">Fält</th>
			<th style="width: 150px;">Data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Erbjuder Personligt Samtal?</td>
			<td><?=$company['interview_offer'];?></td>
		</tr>
		<tr>
			<td>Information om Samtalet</td>
			<td><?=$company['interview_info'];?></td>
		</tr>
		<tr>
			<td>Samma kontakt som profil?</td>
			<td><?=$company['interview_contact_same'];?></td>
		</tr>
		<tr>
			<td>Kontakt Förnamn</td>
			<td><?=$company['interview_contact_firstname'];?></td>
		</tr>
		<tr>
			<td>Kontakt Efternamn</td>
			<td><?=$company['interview_contact_lastname'];?></td>
		</tr>
		<tr>
			<td>Kontakt Epost</td>
			<td><?=$company['interview_contact_email'];?></td>
		</tr>
		<tr>
			<td>Kontakt Mobil</td>
			<td><?=$company['interview_contact_cell'];?></td>
		</tr>
	</tbody>
</table>
  