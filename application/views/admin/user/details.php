<div style="float: left";">
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
			.Form::close();
?>
</div>