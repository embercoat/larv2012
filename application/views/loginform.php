<html>
	<head>
		<style type="text/css">
			@import url('/css/master.css');
			@import url('/css/form.css');
			@import url(http://fonts.googleapis.com/css?family=Questrial);
			#loginform {
			  height: 150px;
			  width: 400px;
			  color: white;
			  position: absolute;
			  top: 120px;
			  left: 300px;
			}
			#loginform label {
			  font-size: 20px;
			}
		</style>
		<title>LARV Login</title>
	</head>
	<body>
	<div id="wrap">
		<div id="header">
			<div id="logo">
				<a href="index.htm" title=""><img src="/images/logo.png" alt="LARV" /></a>
			</div>
			<div id="logo-teknolog">
				<a href="index.htm" title=""><img src="/images/logo_teknologkaren.png" alt="logo_teknologkaren" /></a>
			</div>
		</div>
		<div id="loginform">
			<?=Form::open('/login/login/', array('method' => 'post')); ?>
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
	</div>
	</body>
</html>