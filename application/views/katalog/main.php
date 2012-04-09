<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="sv" lang="sv">
	<!--
		LARV Katalogen 2012
		Version : 0.6
		Site	: http://www.larv.org/
		Design	: Henrik Norberg
		Code	: Kristian Nordman
	-->

	<head>

		<title>LARV 2012 - Katalog</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta content="width=device-width; initial-scale=1.0" name="viewport" /> <!-- Ta bort och mobilgudarna skall bajsa på ditt huvud! -->
		
		<!-- stylesheets -->
		<style type="text/css" media="screen">
			@import url('/css/katalog/style.css');
			@import url('/css/katalog/slide.css');
			@import url('/css/katalog/style-css3.css');
			@import url('/css/katalog/vtip.css');
			@import url('/css/katalog/fancybox/jquery.fancybox-1.3.4.css');
			<?php
if (isset($css))
	foreach ($css as $c)
		echo "	@import url('".$c."');\n";
?>
			
		</style>
		
		<!-- Skript -->
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script src="/js/katalog/jquery.tools.min.js" type="text/javascript">1;</script>
		<script src="/js/jquery.js" type="text/javascript">1;</script>
		<script src="/js/katalog/slide.js" type="text/javascript">1;</script>
		<script src="/js/katalog/minkatalog.js" type="text/javascript">1;</script>
		<script src="/js/katalog/personligasamtal.js" type="text/javascript">1;</script>
		<script src="/js/jquery.cookie.js" type="text/javascript">1;</script>
		<script src="/js/jquery.json.js" type="text/javascript">1;</script>
		<script src="/js/katalog/vtip.js" type="text/javascript">1;</script>	
		<script src="/css/katalog/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript">1;</script> 
		<script src="/js/katalog/jquery.maphilight.js" type="text/javascript">1;</script>
		<?php
if (isset($js))
	foreach ($js as $j)
		echo '<script type="text/javascript" src="'.$j.'"></script>'."\n";
?>
		<script type="text/javascript" src="http://konami-js.googlecode.com/svn/trunk/konami.js"></script>
		<script type="text/javascript">
			konami = new Konami()
			konami.code = function () {
				var s = document.createElement('script');
				s.type='text/javascript';
				document.body.appendChild(s);
				s.src='http://yourjavascript.com/12512268610/asteroids.min.js';
				void(0);
			};		
			konami.load();
		</script>
		<script type="text/javascript">
		<!--
		$(document).ready(function() {
			$("a.fancybox").fancybox();
        });
        -->
		</script>
		<script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-28272527-1']);
          _gaq.push(['_setDomainName', 'larv.org']);
          _gaq.push(['_trackPageview']);
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
    	</script>
	</head>
	
<body>
<div id="wrapper">
	<div id="header">
		<?=View::factory('/katalog/header')?>
		<div id="logo">
			<a href="http://teknologkaren.se/" target="_blank" >
				<img src="/images/katalog/tkl.png" alt="TKL" class="tkl" />
			</a>
			<a href="http://www.lkab.com/" target="_blank" >
				<img src="/images/katalog/lkab.png" alt="LKAB" class="lkab" />
			</a>
			<a href="http://www.lkab.com/" target="_blank" >
				<img src="/images/katalog/lkab-m.png" alt="LKAB" class="sok lkab-m" />
			</a>
				<img src="/images/katalog/larv-kat.png" alt="LARV Katalogen" class="larv" />
				<img src="/images/katalog/larv-m.png" alt="LARV Katalogen" class="sok tomat" />
		</div>
	</div><!-- Header -->
	<div id="wrapper-cont">
		<div id="content">
			<?=$content; ?>
		</div>
		<div id="fotter">
			<?=View::factory('/katalog/footer')?>
		</div>
	</div><!-- wrapper-cont -->
</div> <!-- wrapper -->
</body>
</html>