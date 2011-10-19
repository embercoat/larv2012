<?='<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>LARV</title> 
		<style type="text/css">
			@import url('/css/resethtml5.css');
			@import url('/css/style.css');
			@import url('/css/form.css');
<?php
	if(isset($css))
		foreach($css as $c)
			echo '			@import url(\''.$c.'\');'."\r\n";
?>
        	</style>
        
        <script type="text/javascript" src="/js/jquery.js">1;</script>
        <?php
            if(isset($js))
                foreach($js as $j)
                    echo '<script type="text/javascript" src="'.$j.'">1;</script>'."\r\n";
        ?>
        <script type="text/javascript" src="/js/mainAdmin.js">1;</script>
    </head>
<body>
	<div id="topBanner">
		LARV 2.0
	</div>
	<div id="container">
		<div id="menu">
			Menyn!
		</div>
		<div id="content">
			<?=$content; ?>
		</div>
	</div>
	<?=View::factory('stats'); ?>
</body>
</html>
