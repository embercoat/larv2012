<div class="pizza nav-global">
<?php
$curPage = Request::$current->controller();
$menu = array(
	array("controller" => "welcome",  "url" => "/katalog/",  		"title" => "Hem",     		"text" => "Hem", 			'image' => '/images/katalog/home.png'),
	array("controller" => "sok", 	  "url" => "/katalog/sok/", 	"title" => "Sök",      		"text" => "Sök", 			'image' => '/images/katalog/sok-m.png'),
	array("controller" => "karta",    "url" => "/katalog/karta/", 	"title" => "Monterkarta", 	"text" => "Monterkarta", 	'image' => '/images/katalog/globe.png'),
	array("controller" => "skolan",   "url" => "/katalog/skolan/", 	"title" => "Skolan",    	"text" => "Skolan", 		'image' => '/images/katalog/book-brown.png'),
	array("controller" => "faq",      "url" => "/katalog/faq/", 	"title" => "FAQ",        	"text" => "FAQ",			'image' => ''),
	//	array("controller" => "program",  "url" => "/katalog/program/", "title" => "Utbildningar",  "text" => "Utbildningar", 	'image' => '/images/katalog/receipt-text.png'),
);

echo "<ul>\n";
foreach($menu as $m) {
	$class = ($curPage == $m["controller"]) ? ' class="active"' : '';
	echo "	<li><a{$class} href=\"{$m["url"]}\" title=\"{$m["title"]}\"><span>{$m["text"]}</span></a></li>\n";
}
if(!isset($_SESSION['user']) || !$_SESSION['user']->logged_in()) {
    echo '<li><a href="/login/redirect/'.str_replace('/', '_', Request::$current->uri()).'" title="Logga In"><span>Logga In</span></a></li>';
    echo '<li><a href="/register/" title="Registrera"><span>Registrera</span></a></li>';
} else {
    if($_SESSION['user']->is_company_user())
        echo '<li><a href="/katalog/cvbasen/" title="CVBasen"><span>CVBasen</span></a></li>';
    else
        echo '<li><a href="/user/" title="Profil"><span>Min Sida</span></a></li>';
}
echo "</ul>\n";
?>
</div>
<div class="sok nav-global">
	<ul>
	<?php foreach($menu as $m)
		if(!empty($m['image'])){ ?>
		<li><a<?=$class; ?> href="<?=$m["url"];?>" title="<?=$m["title"]; ?>"><img src="<?=$m["image"]; ?>" alt="<?=$m['image'];?>"/> </a></li>
	<?php } ?>
	</ul>
</div>