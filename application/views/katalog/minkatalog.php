<html>	
    <head>
    <title>LARV-Katalogen 2012</title>
	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<style media="screen" type="text/css">
		@import url('/css/katalog/style-export.css');
		@import url('/css/katalog/style-css3-m.css'); 
	</style>
    </head>
    <body>
	<?php
	if(!isset($renderIndex) || $renderIndex == true){ 
	?>
	<div id="header">
		<div id="logo">
			<img class="larv" alt="LARV Katalogen" src="images/katalog/larv-kat2012.png" /> 
			<img class="lkab" alt="LKAB" src="images/katalog/lkab.png" />
		</div>
	</div>
	<?php } ?>
	<div id="wrapper">
	<?php
	if(!isset($renderIndex) || $renderIndex == true){ 
	?>
	<div id="template-cont">
		<h2>Innehållsförteckning: </h2>
			<ul class="press">
				<?php foreach($companies as $c){ ?>
				<li><?=$c['catalogue_company_name']; ?></li>
				<?php } ?>
			</ul>
			<!-- <img alt="Monterkarta-B" src="images/booth/b_huset.jpg" class="monter" />
			<img alt="Monterkarta-c" src="images/booth/c_huset.jpg" class="monter" /> -->
	</div>
	<div class="line"></div>
	<?php } ?>
    <?php foreach($companies as $c){ ?>
	<div id="wrapper-cont">
			
			<table class="press">
			<tr>
               <th class="foretagab"> <h1><?=$c['catalogue_company_name']; ?></h1></th>
			   <th class="right kont">
			   <?php if($c['catalogue_contact_same'] == 'Nej, no') { ?>
                <ul>
                    <li><?php echo $c['catalogue_contact_firstname'].' '.$c['catalogue_contact_lastname']; ?></li>
                    <li><em><?php echo $c['catalogue_contact_position']; ?></em></li>
                    <li><a href="mailto:<?php echo $c['catalogue_contact_email']; ?>" title="Maila <?php echo $c['catalogue_contact_firstname'].' '.$c['catalogue_contact_lastname']; ?>"><?php echo $c['catalogue_contact_email']; ?></a></li>
                    <? if(!empty($c['catalogue_contact_cell'])) { ?><li><?php echo $c['catalogue_contact_cell']; ?></li><? } ?>
                </ul>
                <?php } else { ?> 
                <ul>
                    <li><?php echo $c['contact_firstname'].' '.$c['contact_lastname']; ?></li>
                    <li><a href="mailto:<?php echo $c['contact_email']; ?>" title="Maila <?php echo $c['contact_firstname'].' '.$c['contact_lastname']; ?>"><?php echo $c['contact_email']; ?></a></li>
                    <? if(!empty($c['contact_cell'])) { ?><li><?php echo $c['contact_cell']; ?></li><? } ?>
                </ul>
                <?php } ?>
				</th>
			</tr>
			<tr>
			<td colspan="2">
			<table class="fakta">
                    <tr>
                        <th colspan="2" class="fakta-t">
                            <h2>Företagsfakta</h2>
                        </th>
                    </tr>
                    <tr>
                        <td class="fakta2">
                            <p>Brancher: </p>
                        </td>
                        <td class="info">
                            <ul>
							<?php if(!empty($c['branches'])){foreach($c['branches'] as $b){ ?>
															<li><a href="#"><?=$b['branch']; ?></a></li>
							<?php }}else {?>
								<li><em>Inga brancher</em></li>
								<? }
								?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="fakta2">
                            <p>Verksamhetsorter: </p>
                        </td>
                        <td class="info">
                            <ul>
								<?php if(!empty($c['cities'])){foreach($c['cities'] as $ci){ ?>
																<li><a href="#"><?=$ci['name']; ?></a></li>
								<?php } }else {?>
									<li><em>Inga Verksamhetsorter</em></li>
									<? }
									?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="fakta2">
                            <p>Finns i länderna: </p>
                        </td>
                        <td class="info">
                            <ul>
							<?php 
								if(!empty($c['countries'])){
									foreach($c['countries'] as $cy){ ?>
															<li><a href="#"><?=$cy['name']; ?></a></li>
							<?php }
								} else {?>
								<li><em>Inga Länder</em></li>
								<? }
								?>
                            </ul>
                        </td>
                    </tr>    
                    <tr>
                        <td class="fakta2">
                            <p>Anställda i Sverige: </p>
                        </td>
                        <td class="info">
                            <ul>
                                <li><a href="#"><?=$c['catalogue_employees_sweden']; ?></a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="fakta2">
                            <p>Anställda totalt: </p>
                        </td>
                        <td class="info">
                            <ul>
                                <li><a href="#"><?=$c['catalogue_employees_global']; ?></a></li>
                            </ul>
                        </td>
                    </tr> 
                    <tr>
                        <td class="fakta2">
                        <p>Utbildningar:</p>
                        </td>
                        <td class="info">
                            <ul>
							<?php if(!empty($c['programs'])){foreach($c['programs'] as $p) { ?>
															<li><a href="#"><?=$p['shortname']; ?></a></li>
							<?php } }else {?>
								<li><em>Inga Program</em></li>
								<? }
								?>
                              </ul>
                        </td>
                    </tr>            
                    <tr>
                        <td class="fakta2">
                            <p>Intresserad av: </p>
                        </td>
                        <td class="info">
                            <ul >
							<?php if(!empty($c['educationtypes'])){foreach($c['educationtypes'] as $e) { ?>
															<li><a href="#"><?=$e['shortname']; ?></a></li>
							<?php } }else {?>
								<li><em>Inga Intressen</em></li>
								<? }
								?>
                            </ul>
                        </td>
                    </tr>    
                    <tr>
                        <td class="fakta2">
                            <p>Erbjuder: </p>
                        </td>
                        <td class="info">
                            <ul>
							<?php if(!empty($c['offers'])){foreach($c['offers'] as $o) { ?>
															  <li><a href="#"><?=$o['name']; ?></a></li>
							<?php } }else {?>
								<li><em>Erbjuder Inget</em></li>
								<? }
								?>
                            </ul>
                        </td>
                    </tr>
                </table>
			</td>
			</tr>
			<tr>
                <td class="" colspan="2">
					<h2>Monterplats: <?php echo ($c['booth'] ? $c['booth']['place'] : '<em>Saknas</em>'); ?></h2>
				</td>
			</tr>
			
			<tr>
			    <td>
			    	<img alt="Monterkarta" src="<?php
	    echo ($c['booth'] ? 'images/booth/'.$c['booth']['place'].'.jpg' : 'images/katalog/monterplatskommer.jpg');
			    	  ?>" class="monter" />
			    </td>	
				<td class="press mumma">
			        <h2><?=((isset($c['catalogue_company_eng_head']) && $c['catalogue_company_eng_head'] == 1) ? 'About the Company' :'Om Företaget'); ?></h2>
                    <p><?=$c['catalogue_company_description']; ?></p>
         
                    <?php if(!empty($c['catalogue_why_visit'])){ ?>
                    <h2><?=((isset($c['catalogue_company_eng_head']) && $c['catalogue_company_eng_head'] == 1) ? 'Come and talk to us about..' :'Kom och prata med oss om..'); ?></h2>
                    <p><?=$c['catalogue_why_visit']; ?></p>
                <?php } ?>
				</td>
            </tr>

			</table>
			</div>
            	<?php } ?>
	
	</div>
	<!--<div id="fotter">
		<img class="lkab" alt="LKAB" src="images/katalog/lkab_big.png" />
		<h2>Huvudsamarbetspartner 2012</h2>
	</div>-->
    </body>
</html>