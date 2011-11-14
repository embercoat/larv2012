<?php
	if(isset($register_success))
	{
		 if(!$register_success){
			?>Det har uppstått fel.<ul><?
			foreach($error as $e){
			?>
				<li><?=$e; ?></li>
			<?
			?></ul><?
			}
		 } else { ?>
		 	Grattis <?=$name; ?>. Du är nu registrerad och inloggad på Larv 2.0. Nu kan du göra samma saker som de coola kidsen.
		 <? } 
	}
	if(!isset($register_success) || !$register_success){
		
		echo Form::open('/register/', array('method' => 'post'))
			
			.Form::label('fname', 'Förnamn')
			.Form::input('fname')
			
			.Form::label('lname', 'Efternamn')
			.Form::input('lname')
			
			.Form::label('username', 'Användarnamn')
			.Form::input('username')
			
			.Form::label('password', 'Lösenord')
			.Form::password('password')
			
			.Form::label('password2', 'Bekräfta lösenord')
			.Form::password('password2')
			
			.Form::label('email', 'Epostadress')
			.Form::input('email')
			
			.Form::label('telephone', 'Telefonnummer')
			.Form::input('telephone')
			
			.Form::label('program', 'Program')
			.Form::select('program', user::get_program(false, true))

			.Form::label('program_ovrig', 'Övrigt Program')
			.Form::input('program_ovrig')
			
			
			.Form::submit('submit', 'Registrera')
			.Form::close();
	}
?>
