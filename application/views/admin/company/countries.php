Länder
<?php
echo Form::open('/admin/company/countries/'.$company['company_id']);
?>
<a href="javascript:updatePDF(<?php echo $company['company_id']; ?>)">Update Company PDF</a>
<table>
	<thead>
		<tr>
			<th>Land</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($countries as $key => $country){
	    $checked = false;
	        foreach($company_countries as $c){
	    	    $checked = (($c['id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$country; ?></td>
	    	<td><?=Form::checkbox('country[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>