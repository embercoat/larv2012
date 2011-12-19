<div id="nav-global" class="pizza">
<?php
$curPage = Request::$current->controller();
$menu = array(
	array("controller" => "",  		  "url" => "/",   				"title" => "Hem",           "text" => "Hem", 			'image' => ''),
	array("controller" => "welcome",  "url" => "/katalog/",  		"title" => "Framsidan",     "text" => "Framsidan", 		'image' => '/images/katalog/home.png'),
	array("controller" => "sok", 	  "url" => "/katalog/sok/", 	"title" => "Sök",      		"text" => "Sök", 			'image' => '/images/katalog/sok-m.png'),
	array("controller" => "karta",    "url" => "/katalog/karta/", 	"title" => "Monterkarta", 	"text" => "Monterkarta", 	'image' => '/images/katalog/globe.png'),
	array("controller" => "skolan",   "url" => "/katalog/skolan/", 	"title" => "Skolan",    	"text" => "Skolan", 		'image' => '/images/katalog/book-brown.png'),
	array("controller" => "program",  "url" => "/katalog/program/", "title" => "Utbildningar",  "text" => "Utbildningar", 	'image' => '/images/katalog/receipt-text.png'),
);

echo "<ul>\n";
foreach($menu as $m) {
	$class = ($curPage == $m["controller"]) ? ' class="active"' : '';
	echo "	<li><a{$class} href=\"{$m["url"]}\" title=\"{$m["title"]}\"><span>{$m["text"]}</span></a></li>\n";
}
echo "</ul>\n";
?>
</div>
<div id="nav-global" class="sok">
	<ul>
	<?php foreach($menu as $m)
		if(!empty($m['image'])){ ?>
		<li><a<?=$class; ?> href="<?=$m["url"];?>" title="<?=$m["title"]; ?>"><img src="<?=$m["image"]; ?>" alt="<?=$m['image'];?>"/> </a></li>
	<?php } ?>
	</ul>
</div>