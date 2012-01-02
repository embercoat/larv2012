<h1>Personliga Samtal <?=$company['org_name']; ?></h1>
<?=Form::open('/admin/company/detailsInterview/'.$company['company_id'].'/edit/'); ?>
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
			<td><?=Form::checkbox('interview_offer', 'Ja, Yes', ($company['interview_offer'] == 'Ja, Yes' ?true:false));?></td>
		</tr>
		<tr>
			<td>Information om Samtalet</td>
			<td><?=$company['interview_info'];?></td>
			<td><?=Form::textarea('interview_info', $company['interview_info']); ?></td>
		</tr>
		<tr>
			<td>Samma kontakt som profil?</td>
			<td><?=$company['interview_contact_same'];?></td>
			<td><?=Form::checkbox('interview_contact_same', 'Ja, Yes', ($company['interview_contact_same'] == 'Ja, Yes' ?true:false));?></td>
		</tr>
		<tr>
			<td>Kontakt Förnamn</td>
			<td><?=$company['interview_contact_firstname'];?></td>
			<td><?=Form::input('interview_contact_firstname', $company['interview_contact_firstname']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Efternamn</td>
			<td><?=$company['interview_contact_lastname'];?></td>
			<td><?=Form::input('interview_contact_lastname', $company['interview_contact_lastname']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Epost</td>
			<td><?=$company['interview_contact_email'];?></td>
			<td><?=Form::input('interview_contact_email', $company['interview_contact_email']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Mobil</td>
			<td><?=$company['interview_contact_cell'];?></td>
			<td><?=Form::input('interview_contact_cell', $company['interview_contact_cell']); ?></td>
		</tr>
	</tbody>
</table>
<?=Form::submit('submit', 'Uppdatera');?>
<?=Form::close(); ?>
  