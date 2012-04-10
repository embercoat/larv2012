<?php
	if(isset($register_success))
	{
		 if(!$register_success){
			?>Det har uppstått fel.<ul><?php
			foreach($error as $e){
			?>
				<li><?=$e; ?></li>
			<?php
			?></ul><?php
			}
		 } else { ?>
		 	<p>Grattis <?=$name; ?>. Du är nu registrerad och inloggad på Larv.org. Det kan nu vara en bra idé att gå till <a href="/user">Mina Sidor</a> och komplettera din profil.</p>
		 <?php }
	}
	if(!isset($register_success) || !$register_success){

		echo Form::open('/register/', array('method' => 'post'))

			.Form::label('fname', 'Förnamn')
			.Form::input('fname', (isset($_POST['fname']) ? $_POST['fname'] : ''))

			.Form::label('lname', 'Efternamn')
			.Form::input('lname', (isset($_POST['lname']) ? $_POST['lname'] : ''))

			.Form::label('username', 'Användarnamn')
			.Form::input('username', (isset($_POST['username']) ? $_POST['username'] : ''))

			.Form::label('password', 'Lösenord')
			.Form::password('password', (isset($_POST['password']) ? $_POST['password'] : ''))

			.Form::label('password2', 'Bekräfta lösenord')
			.Form::password('password2', (isset($_POST['password2']) ? $_POST['password2'] : ''))

			.Form::label('email', 'Epostadress')
			.Form::input('email', (isset($_POST['email']) ? $_POST['email'] : ''))

			.Form::label('telephone', 'Telefonnummer')
			.Form::input('telephone', (isset($_POST['telephone']) ? $_POST['telephone'] : ''))

			.Form::label('program', 'Program')
			.Form::select('program', user::get_program(false, true), (isset($_POST['program']) ? $_POST['program'] : ''))

			.Form::label('program_ovrig', 'Övrigt Program')
			.Form::input('program_ovrig', (isset($_POST['program_ovrig']) ? $_POST['program_ovrig'] : ''))


			.Form::submit('submit', 'Registrera')
			.Form::close();
	}
?>
