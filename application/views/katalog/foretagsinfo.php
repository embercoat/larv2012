<?=View::factory('katalog/minKat'); ?>
<div id="template-cont">
	<div id="press-cont">
			<div class="back">
				<a href="/katalog/sok"><img src="/images/katalog/arrow-180.png" alt="Arrow"> Tillbaka</a>
			</div>
			<div class="sok social-m">
			<?php if(!empty($company['catalogue_link_facebook'])) { ?>
				<a href="<?=$company['catalogue_link_facebook']; ?>" class="fb" title="Besök oss på Facebook"><img src="/images/katalog/facebook.png" alt="fb"></a>
			<?php }?>
				
			<?php if(!empty($company['catalogue_link_twitter'])) { ?>
				<a href="<?=$company['catalogue_link_twitter']; ?>" class="tw" title="Besök oss på Twitter"><img src="/images/katalog/twitter-2.png" alt="tw"></a>
			<?php }?>
				
			<?php if(!empty($company['catalogue_link_youtube'])) { ?>
				<a href="<?=$company['catalogue_link_youtube']; ?>" title="Besök oss på Youtube"><img src="/images/katalog/youtube.png" alt="yt"></a>
			<?php }?>
			</div>
			
			<div class="pluss float-r pizza">
				<a href="#" title="Lägg till i din katalog">
					<img src="/images/katalog/plus.png" alt="Lägg till i din katalog"> Lägg till i din katalog</a>
			</div>
		
			<div class="foretagab"> <h1><?=$company['catalogue_company_name']; ?></h1></div>
			
			<div class="social pizza">
			<?php if(!empty($company['catalogue_link_youtube'])) { ?>
				<a href="<?=$company['catalogue_link_youtube']; ?>" class="yt" title="Besök oss på Youtube" target="_blank">&nbsp;</a>
			<?php }?>

			<?php if(!empty($company['catalogue_link_twitter'])) { ?>
				<a href="<?=$company['catalogue_link_twitter']; ?>" class="tw" title="Besök oss på Twitter" target="_blank">&nbsp;</a>
			<?php }?>

			<?php if(!empty($company['catalogue_link_facebook'])) { ?>
				<a href="<?=$company['catalogue_link_facebook']; ?>" class="fb" title="Besök oss på Facebook" target="_blank">&nbsp;</a>
			<?php }?>
				
			</div>

			<div class="ad">
				<a href="/<?=(isset($company['catalogue_file_ad_big'])?$company['catalogue_file_ad_big']:'upload/ads/missing_big.jpg'); ?>" id="example1">
					<img src="/<?=(isset($company['catalogue_file_ad_big'])?$company['catalogue_file_ad_big']:'upload/ads/missing_big.jpg'); ?>" alt="Bild annons" class="annons">
				</a>
			</div>
			<div class="fakta">
				<table>
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
							<ul class="horizontal industri">
								<?php foreach($branches as $b){ ?>
									<li><a href="#"><?=$b['branch']; ?></a></li>
								<?php } ?>
							</ul>
						</td>
					</tr>
					<tr class="pizza">
						<td class="fakta2">
							<p>Verksamhetsorter: </p>
						</td>
						<td class="info">
							<ul class="horizontal ort">
								<li><a href="#">Luleå</a></li>
								<li><a href="#">Stockholm</a></li>
								<li><a href="#">Göteborg</a></li>
								<li><a href="#">Malmö</a></li>
							</ul>
						</td>
					</tr>
					<tr class="pizza">
						<td class="fakta2">
							<p>Finns i länderna: </p>
						</td>
						<td class="info">
							<ul class="horizontal land">
								<li><a href="#">Sverige</a></li>
							</ul>
						</td>
					</tr>	
					<tr class="pizza">
						<td class="fakta2">
							<p>Anställda i Sverige: </p>
						</td>
						<td class="info">
							<ul class="horizontal anst-s">
								<li><a href="#"><?=$company['catalogue_employees_sweden']; ?></a></li>
							</ul>
						</td>
					</tr>
					<tr class="pizza">
						<td class="fakta2">
							<p>Anställda totalt: </p>
						</td>
						<td class="info">
							<ul class="horizontal anst-t">
								<li><a href="#"><?=$company['catalogue_employees_global']; ?></a></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td class="fakta2">
						<p>Utbildningar:</p>
						</td>
						<td class="info">
							<ul class="horizontal intress">
						  	<?php foreach($programs as $p) { ?>
						  		<li><a href="#"><?=$p['name']; ?></a></li>
						  	<?php } ?>
						  	</ul>
						</td>
					</tr>			
					<tr>
						<td class="fakta2">
							<p>Intresserad av: </p>
						</td>
						<td class="info">
							<ul class="horizontal intress">
								<li><a href="#" title="Arena Jordens Resurser" class="vtip">Jorre</a></li>
								<li><a href="#" title="Arena Media, Musik & Teknik" class="vtip">MMT</a></li>
								<li><a href="#" title="Civilingenjör Datateknik" class="vtip">Data</a></li>
								<li><a href="#" title="Civiningenjör Rymdteknik" class="vtip">Rymd</a></li>
								<li><a href="#" title="Civilingenjör Teknisk fysik och elektroteknik" class="vtip">F</a></li>
								<li><a href="#" title="Civilingenjör Arkitektur" class="vtip">A</a></li>
							</ul>
						</td>
					</tr>	
					<tr>
						<td class="fakta2">
							<p>Erbjuder: </p>
						</td>
						<td class="info">
							<ul class="horizontal erb">
							<?php foreach($offers as $o) { ?>
				  				<li><a href="#"><?=$o['name']; ?></a></li>
						  	<?php } ?>
							</ul>
						</td>
					</tr>
				</table>
			</div>
			<div class="press">
				<p><?=$company['catalogue_company_description']; ?></p>
				<h2>Visste du att?</h2>
				<p>
				<?=$company['catalogue_students_dont_know']; ?>
				</p>
				<h2>Kom och prata med oss om..</h2>
				<p>
					Inspiration till studenten att komma till Företaget AB's monter. Typ vi ger gott godis, vi ska rekrytera 1000pers och har en ingångslön på 30 000kr/mån etc.
				</p>
			</div>

			<div class="press-menu">
				<h2>Monterplats</h2>
				<a id="example1" href="/images/katalog/map/b26.png"><img src="/images/katalog/map/b26-s.png" alt="Monterplats b26" class="monter"></a>
			</div>
			<div class="press-menu">
				<h2>Kontaktuppgifter och länkar</h2>
				<ul>
					<li>John Doe</li>
					<li><em>Arbetstitel</em></li>
					<li><a href="mailto:mail@adress.se" title="Maila John Doe">mail@adress.se</a></li>
					<li>0771 - 55 55 55</li>
				</ul>
				<h3>Länkar</h3>
				<ul>
					<li><a href="<?=$company['catalogue_link_website']; ?>" title="">Hemsida</a></li>
					<li><a href="<?=$company['catalogue_link_website_student']; ?>" title="Företag AB">Hemsida - student</a></li>
					<li><a href="<?=$company['catalogue_link_positions']; ?>" title="Företag AB">Lediga jobb</a></li>
					<li><a href="<?=$company['catalogue_link_internship']; ?>" title="Företag AB">Praktikplatser</a> <br /><em>(Sista ansökningsdag: <?=$company['catalogue_last_day_internship']; ?>)</em></li>
					<li><a href="<?=$company['catalogue_link_summerjob']; ?>" title="Företag AB">Sommarjobb</a> <br /><em>(Sista ansökningsdag: <?=$company['catalogue_last_day_summerjob']; ?>)</em></li>
					<li><a href="<?=$company['catalogue_link_trainee']; ?>" title="Företag AB">Traineeplatser</a> <br /> <em>(Sista ansökningsdag: <?=$company['catalogue_last_day_trainee']; ?>)</em></li>
				</ul>
			</div>
			<div class="press-menu kont">
				<h2>Årets företagsvärd</h2>
				<img src="/images/katalog/vard.jpg" alt="Företagsvärden">
				<ul>
					<li>Nisse Pisse</li>
					<li>Industriellekonomi 4året</li>
				</ul>
			</div>

	</div> <!-- press-cont -->
	</div> <!-- template-cont -->