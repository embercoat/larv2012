Brancher
<?php 
echo Form::open('/admin/company/branches/'.$company['company_id']);
?>
<table>
	<thead>
		<tr>
			<th>Branch</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($branches as $key => $branch){
	    $checked = false;
	        foreach($company_branches as $b){
	    	    $checked = (($b['branch_id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$branch; ?></td>
	    	<td><?=Form::checkbox('branch[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php 
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>