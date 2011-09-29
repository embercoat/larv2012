<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?='<?xml version="1.0" encoding="UTF-8"?>'; ?>
<html>
	<head>
		<title>LARV</title> 
		<style type="text/css">
			@import url(/css/resethtml5.css);
			@import url(/css/style.css);
			@import url(/css/form.css);
        <?php
            if(isset($css))
                foreach($css as $c)
                    echo '@import('.$c.')'."\r\n";
        ?>
        </style>
        
        <script type="text/javascript" src="/js/jquery.js">1;</script>
<!--         <meta http-equiv="Content-Language" content="sv" />          
        <meta name="robots" content="all" />
        <meta name="author" content="Kristian Tiny Nordman" />
        <meta name="email" content="it@larv.org" />
        <meta name="description" content="LARV's officiella hemsida" />
        <meta name="keywords" content="LARV larv ltu mässa " />
         -->
        <?php
            if(isset($js))
                foreach($js as $j)
                    echo '<script type="text/javascript" src="'.$j.'">1;</script>'."\r\n";
        ?>
        <script type="text/javascript" src="/js/main.js">1;</script>
        <? if(!isset($_SESSION['user']) || !$_SESSION['user']->logged_in()) { ?>
        <script type="text/javascript">
            $(document).ready(function(){
    	        document.loginform.textbox_username.focus();
            });
        <? } ?>
        </script>
    </head>
<body>
<div id="body">
	<div id="main">
		<div id="head">
			Larv 2.0
		</div>
		<div id="menu">
			<?=View::factory('menu'); ?>
		</div>
		<div id="mainContent">
		 <?=$content; ?>
		</div>
	</div>
</div>
</body>
</html>
