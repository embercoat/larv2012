Program
<?php 
echo Form::open('/admin/company/programs/'.$company['company_id']);
?>
<table>
	<thead>
		<tr>
			<th>Program</th>
			<th>Checkbox</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($programs as $key => $program){
	    $checked = false;
	        foreach($company_programs as $p){
	    	    $checked = (($p['id'] == $key) ? true : false);
	    	    if($checked) break;
	        }
	    ?>
	    <tr>
	    	<td><?=$program; ?></td>
	    	<td><?=Form::checkbox('program[]', $key, $checked); ?></td>
	    </tr>
	<?php } ?>
	</tbody>
</table>
<?php 
echo Form::submit('submit', 'Uppdatera')
    .form::close();
?>