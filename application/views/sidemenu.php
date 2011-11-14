<?php

$controller = Request::$current->controller();

$sidemenu = array();
foreach (Model::factory('sidemenu')->get_sidemenu($controller) as $item) {
	$sidemenu[] = array(
		'content' => $item['text'],
		'attributes' => array(
			'href' => "/$controller/".($item['action']=='index'?'':"{$item['action']}/")
		)
	);
}

$action = Request::$current->action();

echo "<ul>\n";
foreach ($sidemenu as $alt) {
	echo "	<li><a ";
	foreach($alt['attributes'] as $att => $value) {
		echo "$att=\"$value\"";
	}
	if ($alt['attributes']['href'] == "/".Request::$current->uri()."/") {
		echo ' class="active"';
	}
	echo "><span>{$alt['content']}</span></a></li>\n";
}
echo "</ul>\n";

