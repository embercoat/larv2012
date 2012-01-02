<?=View::factory('/katalog/minKat'); ?>
<div id="toppanel">
		<!-- 
        <div id="panel" class="dropshadow bottomright-small bottomleft-small">
            <div class="content clearfix">
                <div class="left" id="sok">
                <form action="#">
                <table class="pizza">
                    <tr>
                        <td colspan="2"> 
                            <h1 class="val">
                                Sök i LARV-katalogen
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                            <p>Fritext: <input type="text" name="frisok" size="70" />    </p>                    
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">                     
                            <h2>Detaljsök</h2>
                        </td>
                    </tr>    
                    <tr>
                        <td>
                        <p>Brancher: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Dom brancher företaget arbetar i." /></p>
                        </td>
                        <td>
                              <ul class="horizontal industri">
                                <li><a href="#">Industri</a></li>
                                <li><a href="#">Energi</a></li>
                                <li><a href="#">Konsultverksamhet</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Ekonomi</a></li>
                                <li><a href="#">Bygg</a></li>
                                <li><a href="#">Industridesign</a></li>
                                <li><a href="#">Produktdesign</a></li>
                                <li><a href="#">Produktion</a></li>
                                <li><a href="#">Telekommunikation</a></li>
                                <li><a href="#">Kemi</a></li>
                              </ul>
                        </td>
                    </tr>                    
                    <tr>
                        <td  style="width: 110px;">
                        <p>Städer: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="I vilka Svenska städer företaget har kontor." /> </p>
                        </td>
                        <td>
                              <ul class="horizontal ort">
                                <li><a href="#">Hela landet</a></li>
                                <li><a href="#">Luleå</a></li>
                                <li><a href="#">Piteå</a></li>
                                <li><a href="#">Umeå</a></li>
                                <li><a href="#">Stockholm</a></li>
                                <li><a href="#">Uppsala</a></li>
                                <li><a href="#">Malmö</a></li>
                                <li><a href="#">Göteborg</a></li>
                                <li><a href="#">Gävle</a></li>
                              </ul>
                        </td>
                    </tr>                    
                    <tr>
                        <td>
                        <p>Länder: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="I vilka länder företaget har kontor." /> </p>
                        </td>
                        <td>
                              <ul class="horizontal land">
                                <li><a href="#">Sverige</a></li>
                                <li><a href="#">Norge</a></li>
                                <li><a href="#">Finland</a></li>
                                <li><a href="#">Danmark</a></li>
                                <li><a href="#">Tyskland</a></li>
                                <li><a href="#">USA</a></li>
                              </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Antal anställda i Sverige: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Antalet anställda i företaget i Sverige." /></p>
                        </td>
                        <td>
                              <ul class="horizontal anst-s">
                                <li><a href="#">1-9</a></li>
                                <li><a href="#">10-99</a></li>
                                <li><a href="#">100-499</a></li>
                                <li><a href="#">500-999</a></li>
                                <li><a href="#">1000-9999</a></li>
                                <li><a href="#">10000-99999</a></li>
                                <li><a href="#">100000- </a></li>
                              </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Antal anställda i världen: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Det totala antalet anställda i företaget." /></p>
                        </td>
                        <td>
                              <ul class="horizontal anst-t">
                                <li><a href="#">1-9</a></li>
                                <li><a href="#">10-99</a></li>
                                <li><a href="#">100-499</a></li>
                                <li><a href="#">500-999</a></li>
                                <li><a href="#">1000-9999</a></li>
                                <li><a href="#">10000-99999</a></li>
                                <li><a href="#">100000- </a></li>
                              </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Utbildningar: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Vilken sorts utbildning som företaget är intresserad av." /></p>
                        </td>
                        <td>
                              <ul class="horizontal intress">
                                <li><a href="#">Civilingenjör (4.5-5år)</a></li>
                                <li><a href="#">Högskoleingenjör (3år)</a></li>
                                <li><a href="#">Kandidat (3år)</a></li>
                                <li><a href="#">Högskoleutbildning( 2år)</a></li>
                              </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Program: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Vilka program som företaget är intresserad av." /></p>
                        </td>
                        <td>
                              <ul class="horizontal intress">
                                <li><a href="#" title="Arena Jordens Resurser" class="vtip">Jorre</a></li>
                                <li><a href="#" title="Arena Media, Musik &amp; Teknik" class="vtip">MMT</a></li>
                                <li><a href="#" title="Civil/högskoleingenjör Datateknik" class="vtip">Data</a></li>
                                <li><a href="#" title="Civiningenjör Rymdteknik" class="vtip">Rymd</a></li>
                                <li><a href="#" title="Civilingenjör Teknisk fysik och elektroteknik" class="vtip">F</a></li>
                                <li><a href="#" title="Civilingenjör Arkitektur" class="vtip">A</a></li>
                                <li><a href="#" title="Civilingenjör Industriell miljö och processteknik" class="vtip">IMP</a></li>
                                <li><a href="#" title="Civilingenjör Kemi/Kemiteknisk design" class="vtip">Kemi</a></li>
                                <li><a href="#" title="Civilingenjör Naturresursteknik" class="vtip">Natur</a></li>
                                <li><a href="#" title="Civilingenjör Väg- och vattenbyggnad" class="vtip">VoV</a></li>
                                <li><a href="#" title="Civilingenjör Industriell ekonomi" class="vtip">I</a></li>
                                <li><a href="#" title="Civilingenjör Öppen ingång" class="vtip">Ö</a></li>
                                <li><a href="#" title="Civilingenjör Internationel materialteknik" class="vtip">EEIGM</a></li>
                                <li><a href="#" title="Civilingenjör Hållbar energiteknik" class="vtip">HET</a></li>
                                <li><a href="#" title="Civilingenjör Maskinteknik" class="vtip">M</a></li>
                                <li><a href="#" title="Civil/högskoleingenjör Teknisk design" class="vtip">TD</a></li>
                                <li><a href="#" title="Civilingenjör Träteknik" class="vtip">Trä</a></li>
                                <li><a href="#" title="Högskoleingenjör Bilsystemteknik" class="vtip">BST</a></li>
                                <li><a href="#" title="Högskoleingenjör Flygsystem och trafikledning" class="vtip">Flyg</a></li>
                                <li><a href="#" title="Högskoleingenjör Mobila datorsystem" class="vtip">MD</a></li>
                                <li><a href="#" title="Högskoleingenjör Bergmaterial/Bergteknik" class="vtip">Berg</a></li>
                                <li><a href="#" title="Högskoleingenjör Miljö- och kvalitetsmanagement" class="vtip">MKM</a></li>
                                <li><a href="#" title="Brandingenjör" class="vtip">Brand</a></li>
                                <li><a href="#" title="Civilekonomprogrammet" class="vtip">CE</a></li>
                                <li><a href="#" title="Lärarprogrammet" class="vtip">L</a></li>
                                <li><a href="#" title="Sjukgymnastprogrammet" class="vtip">S</a></li>
                                <li><a href="#" title="Systemvetarprogrammet" class="vtip">Sys</a></li>
                                <li><a href="#" title="Juridikprogrammet" class="vtip">J</a></li>
                                <li><a href="#" title="Politik och samhällsutveckling" class="vtip">PS</a></li>
                                <li><a href="#" title="Fastighetsmäklare" class="vtip">FM</a></li>
                                <li><a href="#" title="Intresserad av alla program" class="vtip">Alla</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <p>Erbjuder: <img src="/images/katalog/info16x16.png" alt="Info" class="vtip" title="Vad företaget kan erbjuda dig som student." /></p>
                        </td>
                        <td>
                              <ul class="horizontal erb">
                                <li><a href="#">Praktikplats</a></li>
                                <li><a href="#">Sommarjobb</a></li>
                                <li><a href="#">Exjobb</a></li>
                                <li><a href="#">Trainee</a></li>
                                <li><a href="#">Utlandsmöjligheter</a></li>
                                <li><a href="#" class="vtip" title="Möjlighet att önska ett personligt samtal med företaget.">Personligt samtal</a></li>
                              </ul>
                        </td>
                    </tr>                    
                    <tr>
                        <td colspan="2">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                    <td colspan="2">

                        <input type="button" class="button" value="Sök" />
                        
                    </td>
                    </tr>
                </table>
                </form> 
            </div> <!-- left - ->

        </div>
    </div> <!-- /login -- >    

        <!-- The tab on top -- >    
        <div class="tab">
            <ul class="login">
                <li id="toggle" class="larv-grad dropshadow bottomright-small bottomleft-small">
                    <a id="open" class="open" href="#"></a>
                    <a id="close" style="display: none;" class="close" href="#"></a>            
                </li>
            </ul> 
        </div> <!-- / top -- >
			 -->        
    </div> <!--panel -->
    <div id="list-container">
    <p class="sok"><input type="text" name="frisok" size="32" /> <input type="button" class="button" value="Sök" />    </p>
    <div id="foretag-list">
        <form action="#">
        <h1>Företag A-Ö</h1>
        <div class="right"><input id="selectAllBox" type="checkbox" name="foretag" value="total" class="pizza" /> <label for="selectAllBox" title="Välj alla företag" class="vtip pizza">Alla företag</label></div>
        <div class="list">
            <h2>A</h2>
            <ul>        
        <?php 
    $firstLetter = 'A';
    foreach($companies as $id => $c){
        if(substr($c, 0, 1) != $firstLetter){
            $firstLetter = substr($c, 0, 1);
            $firstLetter = (ord($firstLetter) == 195 ? $firstLetter.substr($c, 1, 1) : $firstLetter);
                ?>
            </ul>
            </div>
            <div class="list">
                <h2><?=$firstLetter; ?></h2>
                <ul>
                    
                <?php 
        }
        $checked = '';
        if(isset($_COOKIE['catalogue']) && !empty($_COOKIE['catalogue']) && $_COOKIE['catalogue'] != 'undefined'){
            $checked = (array_search($id, json_decode($_COOKIE['catalogue'])) === false ? '' :'checked');
        }
        ?>
            <li>
                <input type="checkbox" name="foretag[]" value="<?=$id; ?>" class="pizza" <?=$checked ?> />
                <a href="/katalog/foretag/<?=$id; ?>"><?=$c; ?></a>
            </li>
        <?php } ?>
        </ul>
        </div>
    </form>
    </div> <!-- foretag-list -->
    </div> <!-- list-container -->