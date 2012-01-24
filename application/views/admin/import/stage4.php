<?php
echo Form::open('/admin/import/stage5')
	.Form::hidden('filename', $filename)
	.Form::hidden('carryOn', $carryOn);
	$alternator = 0;
	$preset = array (
    6 => 'company_username',
    7 => 'billing_reference',
    8 => 'billing_phone',
    9 => 'billing_address',
    10 => 'billing_zipcode',
    11 => 'billing_city',
    12 => 'billing_country',
    13 => 'billing_extra_information',
    14 => 'contact_firstname',
    15 => 'contact_lastname',
    16 => 'contact_email',
    17 => 'contact_alt_email',
    18 => 'contact_cell',
    19 => 'contact_phone',
    20 => 'org_name',
    21 => 'org_number',
    22 => 'org_type',
    23 => 'org_address',
    24 => 'org_zipcode',
    25 => 'org_city',
    26 => 'org_phone_switch',
    27 => 'org_webpage',
    28 => 'org_webpage_student',
    29 => 'org_address_information',
    30 => 'event_tickets_evening',
    31 => 'event_tickets_lunch',
    32 => 'event_tickets_banquet',
    33 => 'event_tickets_drink',
    34 => 'interview_offer',
    35 => 'interview_info',
    36 => 'interview_contact_same',
    37 => 'interview_contact_firstname',
    38 => 'interview_contact_lastname',
    39 => 'interview_contact_email',
    40 => 'interview_contact_cell',
    41 => 'larv_survey',
    42 => 'goods_packages',
    43 => 'goods_to_fair',
    44 => 'goods_from_fair',
    45 => 'goods_from_fair_packages',
    46 => 'goods_from_fair_pallets',
    47 => 'goods_from_fair_larv',
    48 => 'goods_details',
    49 => 'booth_contact_same',
    50 => 'booth_contact_firstname',
    51 => 'booth_contact_lastname',
    52 => 'booth_contact_email',
    53 => 'booth_contact_cell',
    54 => 'booth_contact_phone',
    55 => 'larv_base_package',
    56 => 'booth_regular_tables',
    57 => 'booth_regular_chairs',
    58 => 'booth_parking_tickets',
    59 => 'booth_wireless',
    60 => 'booth_sockets',
    61 => 'booth_heavy_equipment_description',
    62 => 'booth_heavy_equipment',
    63 => 'booth_placement_room',
    64 => 'booth_placement_house',
    65 => 'booth_extra_help_build_yes',
    66 => 'booth_extra_help_build_no',
    67 => 'booth_extra_highchairs',
    68 => 'booth_extra_hightables',
    69 => 'booth_extra_carpet',
    70 => 'booth_extra_plant',
    71 => 'booth_extra_monitor',
    72 => 'booth_extra_monitor_stand',
    73 => 'booth_threephase',
    74 => 'booth_threephase_description',
    75 => 'booth_width',
    76 => 'booth_depth',
    77 => 'booth_height',
    78 => 'booth_extra_area',
    79 => 'booth_total_cost',
    80 => 'catalogue_company_name',
    81 => '',
    120 => 'catalogue_cities',
    121 => 'catalogue_employees_sweden',
    122 => 'catalogue_countries',
    123 => 'catalogue_employees_global',
    124 => 'catalogue_company_description',
    169 => 'catalogue_students_dont_know',
    170 => 'catalogue_why_visit',
    171 => 'catalogue_question_freetext',
    172 => 'catalogue_answer',
    173 => 'catalogue_question',
    174 => 'catalogue_contact_same',
    175 => 'catalogue_contact_firstname',
    176 => 'catalogue_contact_lastname',
    177 => 'catalogue_contact_email',
    178 => 'catalogue_contact_cell',
    179 => 'catalogue_contact_position',
    180 => 'catalogue_ad_description',
    185 => 'catalogue_link_website',
    186 => 'catalogue_link_website_student',
    187 => 'catalogue_last_day_xjob',
    188 => 'catalogue_link_internship',
    189 => 'catalogue_last_day_internship',
    190 => 'catalogue_link_summerjob',
    191 => 'catalogue_last_day_summerjob',
    192 => 'catalogue_link_trainee',
    193 => 'catalogue_last_day_trainee',
    194 => 'catalogue_link_positions',
    195 => 'catalogue_link_facebook',
    196 => 'catalogue_link_twitter',
    197 => 'catalogue_link_youtube',
  );
?>
<h1>Fält</h1>
<table>
	<thead>
		<tr>
			<th>Argast</th>
			<th>larv.org</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($index as $key => $i){
		if(array_search($key, $ignore) === FALSE){
	?>
		<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
			<td><?php echo $i; ?></td>
			<td><?php echo Form::input('key['.$key.']', $preset[$key]); ?></td>
		</tr>
	<?php }} ?>
	</tbody>
</table>
<?php
	echo Form::submit('submit', 'Skicka')
		.Form::close();
?>