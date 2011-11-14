
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>LARV</title>
	<style type="text/css">
		@import url(/css/master.css);
		@import url(http://fonts.googleapis.com/css?family=Questrial);
		<?php
               if(isset($css))
                   foreach($css as $c)
                       echo '@import url('.$c.');'."\r\n";
         ?>
	</style>
	<script type="text/javascript" src="/js/main.js">1;</script>
	<script type="text/javascript" src="/js/jquery.js">1;</script>
	<?php
             if(isset($js))
                   foreach($js as $j)
                       echo '<script type="text/javascript" src="'.$j.'">1;</script>'."\r\n";
?>

</head>

<body>
	<div id="wrap">
		<div id="header">
			<div id="logo">
				<a href="/" title=""><img src="/images/logo.png" alt="LARV" /></a>
			</div>
			<div id="logo-teknolog">
				<a href="/" title=""><img src="/images/logo_teknologkaren.png" alt="logo_teknologkaren" /></a>
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
			<div id="login">
				<?
					if($_SESSION['user']->logged_in()){
						?>
						<a href="/login/logout/">Logga Ut</a>
						<?
						if($_SESSION['user']->isAdmin()) {
							?>
							| <a href="/admin/">Administration</a>
							<?
						}
					} else { ?>
						<a href="/login/<?php 
							$redirect = 'redirect/'.str_replace('/', '_', Request::$current->uri());
							echo (!empty($redirect) ? $redirect : '');
						?>	">Logga in</a> | <a href="/register/">Registrera </a>
					<? } ?>
			</div>
			<p><b>Teknologkåren</b><br /> Lulea tekniska universitet <br /> 971 87 Luleå </p> 
		</div>
	</div>	
	<? View::Factory('stats'); ?>
</body>
</html>