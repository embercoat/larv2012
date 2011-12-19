<h1>Katalog <?=$company['org_name']; ?></h1>
<?=Form::open('/admin/company/detailsFile/'.$company['company_id'], array('enctype' => 'multipart/form-data')); ?>
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
			<td>Annons stor</td>
			<td><?=Form::file('catalogue_file_ad_big'); ?></td>
		</tr>
		<tr>
			<td>Annons liten</td>
			<td><?=Form::file('catalogue_file_ad_small'); ?></td>
		</tr>
	</tbody>
</table>
<?=Form::submit('submit', 'Uppdatera');?>
<?=Form::close(); ?>