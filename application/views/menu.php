<?php

$curPage = Request::$current->controller();

$menu = array(
	array("controller" => "welcome", "url" => "/",         "title" => "Start",                        "text" => "Start"),
	array("controller" => "omlarv",  "url" => "/omlarv/",  "title" => "Information om LARV",          "text" => "Om LARV"),
	array("controller" => "foretag", "url" => "/foretag/", "title" => "Information för företag",      "text" => "Företag"),
	array("controller" => "student", "url" => "/student/", "title" => "Kontaktinformation till LARV", "text" => "Studenter"),
	array("controller" => "kontakt", "url" => "/kontakt/", "title" => "Information för studenter",    "text" => "Kontakt"),
	array("controller" => "katalog", "url" => "/katalog/", "title" => "Katalogen",    				  "text" => "Katalog"),
);
if(isset($_SESSION['user']) && $_SESSION['user']->logged_in()){
	$menu[] = array("controller" => "user", "url" => "/user/", "title" => "Användarsidor",    "text" => "Mina Sidor");
} else {
    $menu[] = array("controller" => "login", "url" => '/login/redirect/'.str_replace('/', '_', Request::$current->uri()), "title" => "Logga In",    "text" => "Logga In");
}
echo "<ul>\n";
foreach($menu as $m) {
	$class = ($curPage == $m["controller"]) ? ' class="active"' : '';
	echo "	<li><a{$class} href=\"{$m["url"]}\" title=\"{$m["title"]}\"><span>{$m["text"]}</span></a></li>\n";
}
echo "</ul>\n";
