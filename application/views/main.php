
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
	<?php
             if(isset($js))
                   foreach($js as $j)
                       echo '<script type="text/javascript" src="'.$j.'">1;</script>'."\r\n";
?>
	<script type="text/javascript" src="/js/main.js">1;</script>
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
			<ul>
				<li><a class="active" href="/" title="Start"><span>Start</span></a></li>
				<li><a href="/omlarv/" title="Information om LARV"><span>Om LARV</span></a></li>
				<li><a href="/foretag/" title="Information för företag"><span>Företag</span></a></li>					
				<li><a href="/student/" title="Information för studenter"><span>Studenter</span></a></li>
				<li><a href="/kontakt/" title="Kontaktinformation till LARV"><span>Kontakt</span></a></li>
			</ul>
		</div>
		<div id="content">
			<div id="content-inner">
				<div id="nav-local">
					<ul>
						<li>
							<a class="active" href="index.htm" title="Aktiviteter">
								<span>Aktiviteter</span>
							</a>
						</li>
						<li>
							<a href="index.htm" title="Mässan">
								<span>Mässan</span>
							</a>
						</li>
					</ul>
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
						<a href="/login/">Logga in</a> | <a href="/register/">Registrera </a>
					<? } ?>
			</div>
			<p><b>Teknologkåren</b><br /> Lulea tekniska universitet <br /> 971 87 Luleå </p> 
		</div>
	</div>	
	<?=View::Factory('stats'); ?>
</body>
</html>