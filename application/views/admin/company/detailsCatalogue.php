<h1>Katalog <?=$company['org_name']; ?></h1>
<a href="/admin/company/detailsCatalogue/<?=$company['company_id']; ?>/edit">Edit</a>
<table>
	<thead>
		<tr>
			<th style="width: 150px;">Fält</th>
			<th style="width: 150px;">Data</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Samma kontakt som profil?</td>
			<td><?=$company['catalogue_contact_same'];?></td>
		</tr>
		<tr>
			<td>Kontakt Förnamn</td>
			<td><?=$company['catalogue_contact_firstname'];?></td>
		</tr>
		<tr>
			<td>Kontakt Efternamn</td>
			<td><?=$company['catalogue_contact_lastname'];?></td>
		</tr>
		<tr>
			<td>Kontakt Epost</td>
			<td><?=$company['catalogue_contact_email'];?></td>
		</tr>
		<tr>
			<td>Kontakt Mobil</td>
			<td><?=$company['catalogue_contact_cell'];?></td>
		</tr>
		<tr>
			<td>Kontakt Position</td>
			<td><?=$company['catalogue_contact_position'];?></td>
		</tr>
		<tr>
			<td>Organisationens Namn</td>
			<td><?=$company['catalogue_company_name'];?></td>
		</tr>
		<tr>
			<td>Orter</td>
			<td><?=$company['catalogue_cities'];?></td>
		</tr>
		<tr>
			<td>Anställda i sverige</td>
			<td><?=$company['catalogue_employees_sweden'];?></td>
		</tr>
		<tr>
			<td>Finns i länder</td>
			<td><?=$company['catalogue_countries'];?></td>
		</tr>
		<tr>
			<td>Antal Anställda Globalt</td>
			<td><?=$company['catalogue_employees_global'];?></td>
		</tr>
		<tr>
			<td>Engelska rubriker?</td>
			<td><?=((isset($company['catalogue_company_eng_head']) && $company['catalogue_company_eng_head'] == 1) ? 'Ja' : 'Nej'); ?></td>
		</tr>
		
		<tr>
			<td>Beskrivning av företaget</td>
			<td><?=$company['catalogue_company_description'];?></td>
		</tr>
		<tr>
			<td>Något studenterna inte vet om organisationen</td>
			<td><?=$company['catalogue_students_dont_know'];?></td>
		</tr>
		<tr>
			<td>Varför skall studenterna besöka eran monter</td>
			<td><?=$company['catalogue_why_visit'];?></td>
		</tr>
		<tr>
			<td>En fråga att besvara</td>
			<td><?=$company['catalogue_question'];?></td>
		</tr>
		<tr>
			<td>Fritextfråga</td>
			<td><?=$company['catalogue_question_freetext'];?></td>
		</tr>
		<tr>
			<td>Svar Fritextfråga</td>
			<td><?=$company['catalogue_answer'];?></td>
		</tr>
		<tr>
			<td>Beskrivning Annons</td>
			<td><?=$company['catalogue_ad_description'];?></td>
		</tr>
		<tr>
			<td>Länk hemsida</td>
			<td><?=$company['catalogue_link_website'];?></td>
		</tr>
		<tr>
			<td>Länk hemsida student</td>
			<td><?=$company['catalogue_link_website_student'];?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag Exjobb</td>
			<td><?=$company['catalogue_last_day_xjob'];?></td>
		</tr>
		<tr>
			<td>Länk till </td>
			<td><?=$company['catalogue_link_internship'];?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag praktik</td>
			<td><?=$company['catalogue_last_day_internship'];?></td>
		</tr>
		<tr>
			<td>Tung Utrustning</td>
			<td><?=$company['catalogue_link_summerjob'];?></td>
		</tr>
		<tr>
			<td>Sista ansökningsdag sommarjobb</td>
			<td><?=$company['catalogue_last_day_summerjob'];?></td>
		</tr>
		<tr>
			<td>Länk till Trainee</td>
			<td><?=$company['catalogue_link_trainee'];?></td>
		</tr>
		<tr>
			<td>Länk till Lediga platser</td>
			<td><?=$company['catalogue_link_positions'];?></td>
		</tr>
		<tr>
			<td>Länk till Facebook</td>
			<td><?=$company['catalogue_link_facebook'];?></td>
		</tr>
		<tr>
			<td>Länk till Twitter</td>
			<td><?=$company['catalogue_link_twitter'];?></td>
		</tr>
		<tr>
			<td>Länk till Youtube</td>
			<td><?=$company['catalogue_link_youtube'];?></td>
		</tr>
</tbody>
</table>
  