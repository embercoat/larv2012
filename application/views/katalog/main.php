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

		<title>LARV 2012 - Katalog ***BETA***</title>
		<meta http-equiv="content-type" content="text/html; charset=charset=ISO-8859-1" />
		<meta content="width=device-width; initial-scale=1.0" name="viewport" /> <!-- Ta bort och mobilgudarna skall bajsa på ditt huvud! -->
		
		<!-- stylesheets -->
		<style type="text/css" media="screen">
			@import url('/css/katalog/style.css');
			@import url('/css/katalog/slide.css');
			@import url('/css/katalog/style-css3.css');
			@import url('/css/katalog/vtip.css');
			@import url('/css/katalog/fancybox/jquery.fancybox-1.3.4.css');
		</style>
		
		<!-- Skript -->
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script src="/js/katalog/jquery.tools.min.js" type="text/javascript">1;</script>
		<script src="/js/katalog/jquery-1.3.2.min.js" type="text/javascript">1;</script>
		<script src="/js/katalog/slide.js" type="text/javascript">1;</script>
		<script src="/js/katalog/vtip.js" type="text/javascript">1;</script>	
		<script src="/css/katalog/fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript">1;</script> 
		<script src="/js/katalog/jquery.maphilight.js" type="text/javascript">1;</script>
		
		<script type="text/javascript" src="http://konami-js.googlecode.com/svn/trunk/konami.js"></script>
		<script type="text/javascript">
			konami = new Konami()
			konami.code = function () {
				var s = document.createElement('script');
				s.type='text/javascript';
				document.body.appendChild(s);
				s.src='http://yourjavascript.com/12512268610/asteroids.min.js';
				void(0);
			}			
			konami.load();
		</script>
		<script type="text/javascript">
		
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

			/*
			*   Examples - various
			*/

			$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});

			$("#various2").fancybox();

			$("#various3").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});

			$("#various4").fancybox({
				'padding'			: 0,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		});
		</script>
		<!-- <script type="text/javascript">
			$(function() {
			$('.map').maphilight();
			$('#c50-link').mouseover(function(e) {
			$('#c50').mouseover();
			}).mouseout(function(e) {
			$('#c50').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c51-link').mouseover(function(e) {
			$('#c51').mouseover();
			}).mouseout(function(e) {
			$('#c51').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c52-link').mouseover(function(e) {
			$('#c52').mouseover();
			}).mouseout(function(e) {
			$('#c52').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c53-link').mouseover(function(e) {
			$('#c53').mouseover();
			}).mouseout(function(e) {
			$('#c53').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c54-link').mouseover(function(e) {
			$('#c54').mouseover();
			}).mouseout(function(e) {
			$('#c54').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c55-link').mouseover(function(e) {
			$('#c55').mouseover();
			}).mouseout(function(e) {
			$('#c55').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c56-link').mouseover(function(e) {
			$('#c56').mouseover();
			}).mouseout(function(e) {
			$('#c56').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c57-link').mouseover(function(e) {
			$('#c57').mouseover();
			}).mouseout(function(e) {
			$('#c57').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c58-link').mouseover(function(e) {
			$('#c58').mouseover();
			}).mouseout(function(e) {
			$('#c58').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c59-link').mouseover(function(e) {
			$('#c59').mouseover();
			}).mouseout(function(e) {
			$('#c59').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c60-link').mouseover(function(e) {
			$('#c60').mouseover();
			}).mouseout(function(e) {
			$('#c60').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c61-link').mouseover(function(e) {
			$('#c61').mouseover();
			}).mouseout(function(e) {
			$('#c61').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c62-link').mouseover(function(e) {
			$('#c62').mouseover();
			}).mouseout(function(e) {
			$('#c62').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c63-link').mouseover(function(e) {
			$('#c63').mouseover();
			}).mouseout(function(e) {
			$('#c63').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c64-link').mouseover(function(e) {
			$('#c64').mouseover();
			}).mouseout(function(e) {
			$('#c64').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c64-link').mouseover(function(e) {
			$('#c64').mouseover();
			}).mouseout(function(e) {
			$('#c64').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c65-link').mouseover(function(e) {
			$('#c65').mouseover();
			}).mouseout(function(e) {
			$('#c65').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c66-link').mouseover(function(e) {
			$('#c66').mouseover();
			}).mouseout(function(e) {
			$('#c66').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c67-link').mouseover(function(e) {
			$('#c67').mouseover();
			}).mouseout(function(e) {
			$('#c67').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c68-link').mouseover(function(e) {
			$('#c68').mouseover();
			}).mouseout(function(e) {
			$('#c68').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c69-link').mouseover(function(e) {
			$('#c69').mouseover();
			}).mouseout(function(e) {
			$('#c69').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c70-link').mouseover(function(e) {
			$('#c70').mouseover();
			}).mouseout(function(e) {
			$('#c70').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c71-link').mouseover(function(e) {
			$('#c71').mouseover();
			}).mouseout(function(e) {
			$('#c71').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});
			
			$(function() {
			$('.map').maphilight();
			$('#c72-link').mouseover(function(e) {
			$('#c72').mouseover();
			}).mouseout(function(e) {
			$('#c72').mouseout();
			}).click(function(e) { e.preventDefault(); });
			});

		</script> -->
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