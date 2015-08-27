Erbjuder
<?php
echo Form::open('/admin/company/offers/'.$company['company_id']);
?>
<a href="javascript:updatePDF(<?php echo $company['company_id']; ?>)">Update Company PDF</a>
<table>
	<thead>
		<tr>
			<th>Erbjuder</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($offers as $key => $offer){
	    $checked = false;
	        foreach($company_offers as $o){
	    	    $checked = (($o['offer_id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$offer; ?></td>
	    	<td><?=Form::checkbox('offer[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>