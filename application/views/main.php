<!DOCTYPE html>
<html>
<head>
	<title>LARV</title>
	<style type="text/css">
	@import url(/css/master.css);
	@import url(/css/form.css);
	@import url(http://fonts.googleapis.com/css?family=Questrial);
<?php
if (isset($css))
	foreach ($css as $c)
		echo "	@import url($c);\n";
?>
	</style>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/jquery.js"></script>
<?php
if (isset($js))
	foreach ($js as $j)
		echo '<script type="text/javascript" src="'.$j.'"></script>'."\n";
?>
	<link rel="alternate" type="application/rss+xml" href="/feed" title="RSS flöde">
</head>
<body>
<div id="wrap">
	<div id="header">
		<div id="logo">
			<a href="/"><img src="/images/LARV_Logo.png" alt="LARV" /></a>
		</div>
		<div id="logo-teknolog">
			<a href="http://teknologkaren.se/"><img src="/images/logo_teknologkaren.png" alt="Teknologkåren" /></a>
			<img src="/images/lkab.png" alt="LKAB" />
		</div>
	</div>
	<div id="nav-global">
<?php echo View::factory('menu'); ?>
	</div>
	<div id="content">
		<div id="content-inner">
			<div id="nav-local">
<?php echo View::factory('sidemenu'); ?>
			</div>
			<div id="content-master">
				<?=$content; ?>
			</div>
		</div>
	</div>
	<div id="footer">
		<div id="login"><?php
if ($_SESSION['user']->logged_in()){
	echo '<a href="/login/logout/">Logga Ut</a>';
	if ($_SESSION['user']->isAdmin()) {
		echo ' | <a href="/admin/">Administration</a>';
	}
} else {
	echo '<a href="/login/';
	$redirect = 'redirect/'.str_replace('/', '_', Request::$current->uri());
	if (!empty($redirect)) echo $redirect;
	echo '">Logga in</a> | <a href="/register/">Registrera</a>';
}
?></div>
		<p><b>Teknologkåren</b><br /> Luleå tekniska universitet <br /> 971 87 Luleå </p>
	</div>
</div>
<?php View::Factory('stats'); ?>
</body>
</html>