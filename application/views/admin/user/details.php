<div style="float: left;">
<h1>Användare: <?php echo $user['username']; ?></h1>
<br />
<?php 
//var_dump($user);

echo Form::open('/admin/user/detail/'.$user['user_id'], array('method' => 'post'))
			
			.Form::label('fname', 'Förnamn')
			.Form::input('fname', $user['fname'])
			
			.Form::label('lname', 'Efternamn')
			.Form::input('lname', $user['lname'])
			
			.Form::label('email', 'Epostadress')
			.Form::input('email', $user['email'])
			
			.Form::label('phone', 'Telefonnummer')
			.Form::input('phone', $user['phone'])
			
			.Form::label('programId', 'Program')
			.Form::select('programId', user::get_program(false, true), $user['programId'])
			
			.Form::label('program_ovrig', 'Program Övrigt')
			.Form::input('program_ovrig', $user['program_ovrig'])
			
			.Form::label('usertype', 'Användartyp')
			.Form::select('usertype', 
				array(
					1 => 'Student',
					2 => 'Företag',
					3 => 'Admin'
				)
				, $user['usertype']
			)
			
			.Form::submit('submit', 'Uppdatera')
			.Form::close()
			.Form::button('pwd', 'Byt Lösenord', array('onclick' => 'showPasswordBox()'));
?>
<div style="float: left; clear: both;">
<h1>Intresseanmälan</h1>
<table>
	<thead>
		<tr>
			<th style="width: 100px;">Roll</th>
			<th style="width: 400px;">Motivation</th>
		</tr>
	</thead>
	<tbody>
<?php
	$roles = array(
		'ftv'			=> 'Företagsvärd',
		'chauffor'		=> 'Chaufför',
		'massvard'		=> 'Mässvärd',
		'gods'			=> 'Gods',
		'funktionar'	=> 'Funktionär',
		'inredning'		=> 'Inredning'
	);
	foreach($crew as $c){
?>
		<tr>
			<td><?php echo $roles[$c['role']];?></td>
			<td><?php echo $c['motivation'];?></td>
		</tr>
<?php 
	} 
?>
	</tbody>
</table>
</div>
</div>
<div class="preHidden" id="changeUserPassword">
<?php
echo Form::open('/admin/user/changePassword')
	.Form::hidden('userid', $user['user_id'])
	.Form::label('newPassword', 'Nytt Lösenord')
	.Form::input('newPassword')
	.Form::label('newPassword2', 'Igen')
	.Form::input('newPassword2')
	.Form::submit('submit', 'Byt Lösenord')
	.Form::close();
?>
</div>