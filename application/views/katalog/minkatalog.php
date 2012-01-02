<html>	
    <head>
    <title>LARV-Katalogen 2012</title>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<style media="screen" type="text/css">
		@import url('/css/katalog/style-export.css');
		@import url('/css/katalog/style-css3.css'); 
	</style>
    </head>
    <body>
	<div id="header">
	<div id="logo">
		<img class="larv" alt="LARV Katalogen" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/images/katalog/larv-kat.png" />
		<img class="lkab" alt="LKAB" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/images/katalog/lkab.png" />
	</div>
	</div>
	<div>
			<ul>
				<?php foreach($companies as $c){ ?>
				<li><?=$c['catalogue_company_name']; ?></li>
				<?php } ?>
			</ul>

            	<?php foreach($companies as $c){ ?>

			<table>
			<tr>
               <th class="foretagab" colspan="2"> <h1><?=$c['catalogue_company_name']; ?></h1></th>
			</tr>
			<tr>
			   <td rowspan="4" class="karta">
					<img src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/images/katalog/monterplatskommer.jpg" alt="Monterplats b26" class="" />
			    </td>
				<td class="press">
			        <h2><?=((isset($c['catalogue_company_eng_head']) && $c['catalogue_company_eng_head'] == 1) ? 'About the Company' :'Om Företaget'); ?></h2>
                    <p><?=$c['catalogue_company_description']; ?></p>
         
                    <h2><?=((isset($c['catalogue_company_eng_head']) && $c['catalogue_company_eng_head'] == 1) ? 'Come and talk to us about..' :'Kom och prata med oss om..'); ?></h2>
                    <p><?=$c['catalogue_why_visit']; ?></p>
				</td>
            </tr>

			</table>
            	<?php } ?>

	</div>
    </body>
</html>