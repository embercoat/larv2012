Städer
<?php
echo Form::open('/admin/company/cities/'.$company['company_id']);
?>
<a href="javascript:updatePDF(<?php echo $company['company_id']; ?>)">Update Company PDF</a>
<table>
	<thead>
		<tr>
			<th>Stad</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($cities as $key => $city){
	    $checked = false;
	        foreach($company_cities as $c){
	    	    $checked = (($c['id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$city; ?></td>
	    	<td><?=Form::checkbox('city[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>