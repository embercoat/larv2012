<html>
	<head>
		<style type="text/css">
			@import url('/css/resethtml5.css');
			@import url('/css/style.css');
			@import url('/css/form.css');
		</style>
	</head>
	<body>
	<div id="loginform">
		<?=Form::open('/admin/login/login/', array('method' => 'post')); ?>
			<p>
				<?=Form::hidden('redirect', (isset($redirect)?$redirect:'')); ?>
				<?=Form::label('username', 'Användarnamn');?>
				<?=Form::input('username'); ?>
				<?=Form::label('password', 'Lösenord'); ?>
				<?=Form::password('password'); ?>
				<?=Form::submit('submit', 'Logga In'); ?>
			</p>
		<?=Form::close(); ?>
	</div>
	</body>
</form>
</html>