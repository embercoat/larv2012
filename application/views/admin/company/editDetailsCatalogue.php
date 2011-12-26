<h1>Katalog <?=$company['org_name']; ?></h1>
<?=Form::open('/admin/company/detailsCatalogue/'.$company['company_id'].'/edit/'); ?>

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
			<td>Samma kontakt som profil?</td>
			<td><?=Form::checkbox('catalogue_contact_same', 'Ja, Yes', ($company['catalogue_contact_same'] == 'Ja, Yes' ?true:false));?><?=$company['catalogue_contact_same']; ?></td>
		</tr>
		<tr>
			<td>Kontakt Förnamn</td>
			<td><?=Form::input('catalogue_contact_firstname', $company['catalogue_contact_firstname']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Efternamn</td>
			<td><?=Form::input('catalogue_contact_lastname', $company['catalogue_contact_lastname']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Epost</td>
			<td><?=Form::input('catalogue_contact_email', $company['catalogue_contact_email']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Mobil</td>
			<td><?=Form::input('catalogue_contact_cell', $company['catalogue_contact_cell']); ?></td>
		</tr>
		<tr>
			<td>Kontakt Position</td>
			<td><?=Form::input('catalogue_contact_position', $company['catalogue_contact_position']); ?></td>
		</tr>
		<tr>
			<td>Organisationens Namn</td>
			<td><?=Form::input('catalogue_company_name', $company['catalogue_company_name']); ?></td>
		</tr>
		<tr>
			<td>Orter</td>
			<td><?=Form::input('catalogue_cities', $company['catalogue_cities']); ?></td>
		</tr>
		<tr>
			<td>Anställda i sverige</td>
			<td><?=Form::input('catalogue_employees_sweden', $company['catalogue_employees_sweden']); ?></td>
		</tr>
		<tr>
			<td>Finns i länder</td>
			<td><?=Form::input('catalogue_countries', $company['catalogue_countries']); ?></td>
		</tr>
		<tr>
			<td>Antal Anställda Globalt</td>
			<td><?=Form::input('catalogue_employees_global', $company['catalogue_employees_global']); ?></td>
		</tr>
		<tr>
			<td>Beskrivning av företaget</td>
			<td><?=Form::textarea('catalogue_company_description', $company['catalogue_company_description']); ?></td>
		</tr>
		<tr>
			<td>Något studenterna inte vet om organisationen</td>
			<td><?=Form::textarea('catalogue_students_dont_know', $company['catalogue_students_dont_know']); ?></td>
		</tr>
		<tr>
			<td>Varför skall studenterna besöka eran monter</td>
			<td><?=Form::textarea('catalogue_why_visit', $company['catalogue_why_visit']); ?></td>
		</tr>
		<tr>
			<td>En fråga att besvara</td>
			<td><?=Form::textarea('catalogue_question', $company['catalogue_question']); ?></td>
		</tr>
		<tr>
			<td>Fritextfråga</td>
			<td><?=Form::textarea('catalogue_question_freetext', $company['catalogue_question_freetext']); ?></td>
		</tr>
		<tr>
			<td>Svar Fritextfråga</td>
			<td><?=Form::textarea('catalogue_answer', $company['catalogue_answer']); ?></td>
		</tr>
		<tr>
			<td>Beskrivning Annons</td>
			<td><?=Form::input('catalogue_ad_description', $company['catalogue_ad_description']); ?></td>
		</tr>
		<tr>
			<td>Länk hemsida</td>
			<td><?=Form::input('catalogue_link_website', $company['catalogue_link_website']); ?></td>
		</tr>
		<tr>
			<td>Länk hemsida student</td>
			<td><?=Form::input('catalogue_link_website_student', $company['catalogue_link_website_student']); ?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag Exjobb</td>
			<td><?=Form::input('catalogue_last_day_xjob', $company['catalogue_last_day_xjob']); ?></td>
		</tr>
		<tr>
			<td>Länk till praktik</td>
			<td><?=Form::input('catalogue_link_internship', $company['catalogue_link_internship']); ?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag praktik</td>
			<td><?=Form::input('catalogue_last_day_internship', $company['catalogue_last_day_internship']); ?></td>
		</tr>
		<tr>
			<td>Länk till Sommarjobb</td>
			<td><?=Form::input('catalogue_link_summerjob', $company['catalogue_link_summerjob']); ?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag sommarjobb</td>
			<td><?=Form::input('catalogue_last_day_summerjob', $company['catalogue_last_day_summerjob']); ?></td>
		</tr>
		<tr>
			<td>Länk till Trainee</td>
			<td><?=Form::input('catalogue_link_trainee', $company['catalogue_link_trainee']); ?></td>
		</tr>
		<tr>
			<td>Länk till Lediga platser</td>
			<td><?=Form::input('catalogue_link_positions', $company['catalogue_link_positions']); ?></td>
		</tr>
		<tr>
			<td>Länk till Facebook</td>
			<td><?=Form::input('catalogue_link_facebook', $company['catalogue_link_facebook']); ?></td>
		</tr>
		<tr>
			<td>Länk till Twitter</td>
			<td><?=Form::input('catalogue_link_twitter', $company['catalogue_link_twitter']); ?></td>
		</tr>
		<tr>
			<td>Länk till Youtube</td>
			<td><?=Form::input('catalogue_link_youtube', $company['catalogue_link_youtube']); ?></td>
		</tr>
</tbody>
</table>
<?=Form::submit('submit', 'Uppdatera');?>
<?=Form::close(); ?>
  