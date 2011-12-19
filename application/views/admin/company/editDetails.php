<h1>Företagsinfo <?=$company['org_name']; ?></h1>
<?=Form::open('/admin/company/details/'.$company['company_id'].'/edit/'); ?>
<table>
	<thead>
		<tr>
			<th colspan="2"><?=Form::submit('submit', 'Uppdatera');?></th>
		</tr>
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
			<td><?=Form::select('company_host', $hosts, (isset($company['company_host']) ? $company['company_host']: '')); ?></td>
		</tr>
		<tr>
			<td colspan="2"><h1>Faktura</h1></td>
		</tr>
		<tr>
			<td>Referens</td>
			<td><?=Form::input('billing_reference', $company['billing_reference']); ?></td>
		</tr>
		<tr>
			<td>Telefon</td>
			<td><?=Form::input('billing_phone', $company['billing_phone']); ?></td>
		</tr>
		<tr>
			<td>Adress</td>
			<td><?=Form::input('billing_address', $company['billing_address']); ?></td>
		</tr>
		<tr>
			<td>Postnummer</td>
			<td><?=Form::input('billing_zipcode', $company['billing_zipcode']); ?></td>
		</tr>
		<tr>
			<td>Ort</td>
			<td><?=Form::input('billing_city', $company['billing_city']); ?></td>
		</tr>
		<tr>
			<td>Land</td>
			<td><?=Form::input('billing_country', $company['billing_country']); ?></td>
		</tr>
		<tr>
			<td>Extra info</td>
			<td><?=Form::input('billing_extra_information', $company['billing_extra_information']); ?></td>
		</tr>
		<tr>
			<td colspan="2"><h1>Kontaktinfo</h1></td>
		</tr>
		<tr>
			<td>Förnamn</td>
			<td><?=Form::input('contact_firstname', $company['contact_firstname']); ?></td>
		</tr>
		<tr>
			<td>Efternamn</td>
			<td><?=Form::input('contact_lastname', $company['contact_lastname']); ?></td>
		</tr>
		<tr>
			<td>Epost</td>
			<td><?=Form::input('contact_email', $company['contact_email']); ?></td>
		</tr>
		<tr>
			<td>Alternativ epost</td>
			<td><?=Form::input('contact_alt_email', $company['contact_alt_email']); ?></td>
		</tr>
		<tr>
			<td>Mobil</td>
			<td><?=Form::input('contact_cell', $company['contact_cell']); ?></td>
		</tr>
		<tr>
			<td>Telefon</td>
			<td><?=Form::input('contact_phone', $company['contact_phone']); ?></td>
		</tr>
		<tr>
			<td colspan="2"><h1>Organisation</h1></td>
		</tr>
		<tr>
			<td>Namn</td>
			<td><?=Form::input('org_name', $company['org_name']); ?></td>
		</tr>
		<tr>
			<td>Organisationsnummer</td>
			<td><?=Form::input('org_number', $company['org_number']); ?></td>
		</tr>
		<tr>
			<td>Typ</td>
			<td><?=Form::input('org_type', $company['org_type']); ?></td>
		</tr>
		<tr>
			<td>Adress</td>
			<td><?=Form::input('org_address', $company['org_address']); ?></td>
		</tr>
		<tr>
			<td>Postnummer</td>
			<td><?=Form::input('org_zipcode', $company['org_zipcode']); ?></td>
		</tr>
		<tr>
			<td>Ort</td>
			<td><?=Form::input('org_city', $company['org_city']); ?></td>
		</tr>
		<tr>
			<td>Adress Information</td>
			<td><?=Form::input('org_address_information', $company['org_address_information']); ?></td>
		</tr>
		<tr>
			<td>Telefon Växel</td>
			<td><?=Form::input('org_phone_switch', $company['org_phone_switch']); ?></td>
		</tr>
		<tr>
			<td>Hemsida</td>
			<td><?=Form::input('org_webpage', $company['org_webpage']); ?></td>
		</tr>
		<tr>
			<td>Hemsida Student</td>
			<td><?=Form::input('org_webpage_student', $company['org_webpage_student']); ?></td>
		</tr>
	</tbody>
</table>
<?=Form::submit('submit', 'Uppdatera');?>
<?=Form::close(); ?>
