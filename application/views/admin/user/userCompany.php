<?php
echo Form::open('/admin/user/userCompany'); 
?>
<table>
	<thead>
		<tr>
			<th style="width: 200px;">Företag</th>
			<th>Användare</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($companies as $c){ ?>
		<tr>
			<td><?php echo $c['name']; ?></td>
			<td><?php
			echo Form::select('link['.$c['company_id'].']', $users,
			    (isset($userCompany[$c['company_id']]) ? $userCompany[$c['company_id']] : 0)
			);
			?></td>	
		</tr>
		<?php }?>
	</tbody>
</table>
<?php 
echo Form::submit('submit', 'Uppdatera')
    .Form::close();
?>