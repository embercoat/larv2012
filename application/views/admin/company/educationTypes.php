Utbildningstyper
<?php
echo Form::open('/admin/company/educationTypes/'.$company['company_id']);
?>
<a href="javascript:updatePDF(<?php echo $company['company_id']; ?>)">Update Company PDF</a>
<table>
	<thead>
		<tr>
			<th>Utbildningstyp</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($educationtypes as $key => $et){
	    $checked = false;
	        foreach($company_educationtypes as $e){
	    	    $checked = (($e['id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$et['name']; ?></td>
	    	<td><?=Form::checkbox('educationtype[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>