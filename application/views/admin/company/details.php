<h1>Företagsinfo <?=$company['org_name']; ?></h1>
<a href="/admin/company/details/<?=$company['company_id']; ?>/edit">Edit</a>

<table>
	<thead>
		<tr>
			<th style="width: 150px;">Fält</th>
			<th style="width: 150px;">Data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Användarnamn</td>
			<td><?=$company['company_username'];?></td>
		</tr>
		<tr>
			<td>Företagsvärd</td>
			<td><?=(isset($company['company_host']) ? $hosts[$company['company_host']] : '<i>Ingen Företagsvärd</i>');?></td>
		</tr>
		
		<tr>
			<td colspan="2"><h1>Faktura</h1></td>
		</tr>
		<tr>
			<td>Referens</td>
			<td><?=$company['billing_reference'];?></td>
		</tr>
		<tr>
			<td>Telefon</td>
			<td><?=$company['billing_phone'];?></td>
		</tr>
		<tr>
			<td>Adress</td>
			<td><?=$company['billing_address'];?></td>
		</tr>
		<tr>
			<td>Postnummer</td>
			<td><?=$company['billing_zipcode'];?></td>
		</tr>
		<tr>
			<td>Ort</td>
			<td><?=$company['billing_city'];?></td>
		</tr>
		<tr>
			<td>Land</td>
			<td><?=$company['billing_country'];?></td>
		</tr>
		<tr>
			<td>Extra info</td>
			<td><?=$company['billing_extra_information'];?></td>
		</tr>
		<tr>
			<td colspan="2"><h1>Kontaktinfo</h1></td>
		</tr>
		<tr>
			<td>Förnamn</td>
			<td><?=$company['contact_firstname'];?></td>
		</tr>
		<tr>
			<td>Efternamn</td>
			<td><?=$company['contact_lastname'];?></td>
		</tr>
		<tr>
			<td>Epost</td>
			<td><?=$company['contact_email'];?></td>
		</tr>
		<tr>
			<td>Alternativ epost</td>
			<td><?=$company['contact_alt_email'];?></td>
		</tr>
		<tr>
			<td>Mobil</td>
			<td><?=$company['contact_cell'];?></td>
		</tr>
		<tr>
			<td>Telefon</td>
			<td><?=$company['contact_phone'];?></td>
		</tr>
		<tr>
			<td colspan="2"><h1>Organisation</h1></td>
		</tr>
		
		<tr>
			<td>Namn</td>
			<td><?=$company['org_name'];?></td>
		</tr>
		<tr>
			<td>Organisationsnummer</td>
			<td><?=$company['org_number'];?></td>
		</tr>
		<tr>
			<td>Typ</td>
			<td><?=$company['org_type'];?></td>
		</tr>
		<tr>
			<td>Adress</td>
			<td><?=$company['org_address'];?></td>
		</tr>
		<tr>
			<td>Postnummer</td>
			<td><?=$company['org_zipcode'];?></td>
		</tr>
		<tr>
			<td>Ort</td>
			<td><?=$company['org_city'];?></td>
		</tr>
		<tr>
			<td>Adress Information</td>
			<td><?=$company['org_address_information'];?></td>
		</tr>
		<tr>
			<td>Telefon Växel</td>
			<td><?=$company['org_phone_switch'];?></td>
		</tr>
		<tr>
			<td>Hemsida</td>
			<td><?=$company['org_webpage'];?></td>
		</tr>
		<tr>
			<td>Hemsida Student</td>
			<td><?=$company['org_webpage_student'];?></td>
		</tr>
	</tbody>
</table>
