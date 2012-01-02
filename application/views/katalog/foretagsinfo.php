<? echo View::factory('katalog/minKat');
?>
<div id="template-cont">
    <div id="press-cont">
            <div class="back">
                <a href="/katalog/sok"><img src="/images/katalog/arrow-180.png" alt="Arrow" /> Tillbaka</a>
            </div>
            <div class="sok social-m">
            <?php if(!empty($company['catalogue_link_facebook']) && $company['catalogue_link_facebook'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_facebook']; ?>" class="fb" title="Besök oss på Facebook"><img src="/images/katalog/facebook.png" alt="fb" /></a>
            <?php }?>
                
            <?php if(!empty($company['catalogue_link_twitter']) && $company['catalogue_link_twitter'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_twitter']; ?>" class="tw" title="Besök oss på Twitter"><img src="/images/katalog/twitter-2.png" alt="tw" /></a>
            <?php }?>
                
            <?php if(!empty($company['catalogue_link_youtube']) && $company['catalogue_link_youtube'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_youtube']; ?>" title="Besök oss på Youtube"><img src="/images/katalog/youtube.png" alt="yt" /></a>
            <?php }?>
            </div>
            
            <div class="pluss float-r pizza">
                <a href="#" onclick="catalogue.add(<?=$company['company_id']; ?>)" title="Lägg till i din katalog">
                    <img src="/images/katalog/plus.png" alt="Lägg till i din katalog" /> Lägg till i din katalog</a>
            </div>
        
            <div class="foretagab"> <h1><?=$company['catalogue_company_name']; ?></h1></div>
            
            <div class="social pizza">
            <?php if(!empty($company['catalogue_link_youtube']) && $company['catalogue_link_youtube'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_youtube']; ?>" class="yt" title="Besök oss på Youtube" target="_blank">&nbsp;</a>
            <?php }?>

            <?php if(!empty($company['catalogue_link_twitter']) && $company['catalogue_link_twitter'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_twitter']; ?>" class="tw" title="Besök oss på Twitter" target="_blank">&nbsp;</a>
            <?php }?>

            <?php if(!empty($company['catalogue_link_facebook']) && $company['catalogue_link_facebook'] != 'http://') { ?>
                <a href="<?=$company['catalogue_link_facebook']; ?>" class="fb" title="Besök oss på Facebook" target="_blank">&nbsp;</a>
            <?php }?>
                
            </div>

            <div class="ad">
            	<?php
            	if(isset($company['catalogue_file_ad_big'])){
            		$parts = explode('/', $company['catalogue_file_ad_big']);
            		$filename = array_pop($parts);
            	?>
            	<a href="/upload/ads/<?=$filename; ?>" class="fancybox">
                    <img src="/upload/ads/thumbs/<?=$filename; ?>" alt="Bild annons" class="annons" />
                </a>
            		<?php 	
            	} else { ?>
            	<a href="/upload/ads/missing_big.jpg" class="fancybox">
                    <img src="/upload/ads/thumbs/missing.jpg" alt="Bild annons" class="annons" />
                </a>
            	
            	<?php } ?>
                
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
<?php if(!empty($branches)){foreach($branches as $b){ ?>
                                <li><a href="#"><?=$b['branch']; ?></a></li>
<?php }}else {?>
    <li><em style="font-size: 12px">Inga brancher</em></li>
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
                            <ul class="horizontal ort">
<?php if(!empty($cities)){foreach($cities as $c){ ?>
								<li><a href="#"><?=$c['name']; ?></a></li>
<?php } }else {?>
    <li><em style="font-size: 12px">Inga Verksamhetsorter</em></li>
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
                            <ul class="horizontal land">
<?php 
    if(!empty($countries)){
        foreach($countries as $c){ ?>
								<li><a href="#"><?=$c['name']; ?></a></li>
<?php }
    } else {?>
    <li><em style="font-size: 12px">Inga Länder</em></li>
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
                            <ul class="horizontal anst-s">
                                <li><a href="#"><?=$company['catalogue_employees_sweden']; ?></a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
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
<?php if(!empty($programs)){foreach($programs as $p) { ?>
                                <li><a href="#"><?=$p['shortname']; ?></a></li>
<?php } }else {?>
    <li><em style="font-size: 12px">Inga Program</em></li>
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
                            <ul class="horizontal intress">
<?php if(!empty($educationtypes)){foreach($educationtypes as $e) { ?>
                                <li><a href="#"><?=$e['shortname']; ?></a></li>
<?php } }else {?>
    <li><em style="font-size: 12px">Inga Intressen</em></li>
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
                            <ul class="horizontal erb">
<?php if(!empty($offers)){foreach($offers as $o) { ?>
                                  <li><a href="#"><?=$o['name']; ?></a></li>
<?php } }else {?>
    <li><em style="font-size: 12px">Erbjuder Inget</em></li>
    <? }
    ?>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="press">
            	<?php if(!empty($company['catalogue_company_description']) && $company['interview_offer'] == 'Ja, Yes'){ ?>
                    <h2 class="pizza"><?=((isset($company['catalogue_company_eng_head']) && $company['catalogue_company_eng_head'] == 1) ? 'Interview' :'Personligt samtal'); ?></h2>
                    <p class="pizza"><?=$company['interview_info']; ?></p>
                    <button onclick="ps.add(<?=$company['company_id']; ?>)" class="pizza">Anmäl Intresse</button>
                <?php } ?>
                <?php if(!empty($company['catalogue_company_description'])){ ?>
                    <h2><?=((isset($company['catalogue_company_eng_head']) && $company['catalogue_company_eng_head'] == 1) ? 'About the Company' :'Om Företaget'); ?></h2>
                    <p><?=$company['catalogue_company_description']; ?></p>
                <?php } ?>
                <?php if(!empty($company['catalogue_students_dont_know'])) { ?>
                    <h2><?=((isset($company['catalogue_company_eng_head']) && $company['catalogue_company_eng_head'] == 1) ? 'Did you know?' :'Visste du att?'); ?></h2>
                    <p><?=$company['catalogue_students_dont_know']; ?></p>
                <?php } ?>
                <?php if(!empty($company['catalogue_question'])){ ?>
                    <h2><?=$company['catalogue_question']; ?></h2>
                    <p><?=$company['catalogue_answer']; ?></p>
                <?php } ?>
                <?php if(!empty($company['catalogue_why_visit'])){ ?>
                    <h2><?=((isset($company['catalogue_company_eng_head']) && $company['catalogue_company_eng_head'] == 1) ? 'Come and talk to us about..' :'Kom och prata med oss om..'); ?></h2>
                    <p><?=$company['catalogue_why_visit']; ?></p>
                <?php } ?>
                
            </div>

            <div class="press-menu">
                <h2>Monterplats: <?php echo $booth['place']; ?></h2>
                <a href="/katalog/booth/<?php echo $company['company_id']; ?>.jpg" class="fancybox"><img src="/katalog/booth/<?php echo $company['company_id']; ?>" alt="Monterplats <?php echo $booth['place']; ?>" class="monter" /></a>
            </div>
            <div class="press-menu">
                <h2>Kontaktuppgifter och länkar</h2>
                <?php
                if($company['catalogue_contact_same'] == 'Nej, no') { ?>
                <ul>
                    <li><?php echo $company['catalogue_contact_firstname'].' '.$company['catalogue_contact_lastname']; ?></li>
                    <li><em><?php echo $company['catalogue_contact_position']; ?></em></li>
                    <li><a href="mailto:<?php echo $company['catalogue_contact_email']; ?>" title="Maila <?php echo $company['catalogue_contact_firstname'].' '.$company['catalogue_contact_lastname']; ?>"><?php echo $company['catalogue_contact_email']; ?></a></li>
                    <? if(!empty($company['catalogue_contact_cell'])) { ?><li><?php echo $company['catalogue_contact_cell']; ?></li><? } ?>
                </ul>
                <?php } else { ?> 
                <ul>
                    <li><?php echo $company['contact_firstname'].' '.$company['contact_lastname']; ?></li>
                    <li><a href="mailto:<?php echo $company['contact_email']; ?>" title="Maila <?php echo $company['contact_firstname'].' '.$company['contact_lastname']; ?>"><?php echo $company['contact_email']; ?></a></li>
                    <? if(!empty($company['contact_cell'])) { ?><li><?php echo $company['contact_cell']; ?></li><? } ?>
                </ul>
                <?php } ?>
                <h3>Länkar</h3>
                <ul>
                <?php if(!empty($company['catalogue_link_website']) && $company['catalogue_link_website'] != 'http://') { ?>
                    <li><a href="<?=((substr($company['catalogue_link_website'], 0, 7) !== 'http://') ? 'http://' : '').$company['catalogue_link_website']; ?>" title="">Hemsida</a></li>
                <?php }
                if(!empty($company['catalogue_link_website_student']) && $company['catalogue_link_website_student'] != 'http://') { ?>
                    <li><a href="<?=$company['catalogue_link_website_student']; ?>" title="">Hemsida - student</a></li>
                <?php }
                if(!empty($company['catalogue_link_positions']) && $company['catalogue_link_positions'] != 'http://') { ?>
                    <li><a href="<?=$company['catalogue_link_positions']; ?>" title="">Lediga jobb</a></li>
                <?php }
                if(!empty($company['catalogue_link_internship']) && $company['catalogue_link_internship'] != 'http://') { ?>
                    <li><a href="<?=$company['catalogue_link_internship']; ?>" title="">Praktikplatser</a> <br /><em>(Sista ansökningsdag: <?=$company['catalogue_last_day_internship']; ?>)</em></li>
                <?php }
            	if(!empty($company['catalogue_link_summerjob']) && $company['catalogue_link_summerjob'] != 'http://') { ?>
                    <li><a href="<?=$company['catalogue_link_summerjob']; ?>" title="">Sommarjobb</a> <br /><em>(Sista ansökningsdag: <?=$company['catalogue_last_day_summerjob']; ?>)</em></li>
                <?php }
            	if(!empty($company['catalogue_link_trainee']) && $company['catalogue_link_trainee'] != 'http://') { ?>
                    <li><a href="<?=$company['catalogue_link_trainee']; ?>" title="">Traineeplatser</a> <br /> <em>(Sista ansökningsdag: <?=$company['catalogue_last_day_trainee']; ?>)</em></li>
                <?php } ?>
                </ul>
            </div>
            <div class="press-menu kont">
                <h2>Företagsvärd</h2>
                <?php if(isset($company['company_host'])){ ?>
                <img src="/<?php echo (user::find_user_image($company['company_host']) ? user::find_user_image($company['company_host']) : 'upload/random_profiles/'.Model::factory('data')->get_random_profilepicture()); ?>" alt="Företagsvärden" />
                <ul>
                    <li><?php echo user::get_name_by_id($company['company_host']); ?></li>
                    <li><?php
                         $program = Model::factory('data')->get_program(user::get_data_by_user_id('programid', $company['company_host']));
                         echo $program[0]['name']. ' År: '. user::get_data_by_user_id('year', $company['company_host']);
                         
                    ?></li>
                </ul>
                <?php } else { ?>
                <img src="/<?php echo 'upload/random_profiles/'.Model::factory('data')->get_random_profilepicture(); ?>" alt="Företagsvärden" />
                <ul>
                    <li><i>Företagsvärd saknas</i></li>
                </ul>
                
                <?php } ?>
            </div>

    </div> <!-- press-cont -->
    </div> <!-- template-cont -->