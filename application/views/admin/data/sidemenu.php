<a href="#" onclick="editSidemenu()">Lägg till val i sidmenyn</a>
<table style="width:70%">
<tr>
	<td><b>Id</b></td>
	<td><b>Flik</b></td>
	<td><b>Text</b></td>
	<td><b>Målsida</b></td>
</tr>
<?php
$alternator = 0;
foreach (Model::factory('sidemenu')->get_sidemenu() as $item) {
	$alternator++;
	echo "<tr".($alternator%2 == 0?' style="background-color: silver"':'').">\n";
	echo "	<td>{$item["id"]}</td>\n";
	echo "	<td id=\"controller_{$item['id']}\">{$item["controller"]}</td>\n";
	echo "	<td id=\"text_{$item['id']}\">{$item["text"]}</td>\n";
	echo "	<td id=\"action_{$item['id']}\">{$item["action"]}</td>\n";
	echo "	<td><a onclick=\"editSidemenu({$item['id']})\">Ändra</a></td>\n";
	echo "	<td><a href=\"/admin/data/delSidemenu/{$item['id']}/\" onclick=\"return confirm('Är du helt säker?');\">Radera</a></td>\n";
	echo "</tr>\n";
}

?>
</table>
<div style="position: fixed; top: 200px; left: 600px; background: lightGreen; padding: 10px;" id="editBox" class="preHidden">
	<form action="/admin/data/editSidemenu/" method="post">
<?php
echo Form::hidden('oldid')."\n";
echo Form::input('id', '', array('placeholder' => 'Id'))."\n";
echo Form::select('controller', $controllers)."\n";
echo Form::input('text', '', array('placeholder' => 'Text'))."\n";
echo Form::input('action', '', array('placeholder' => 'Målsida'))."\n";

echo Form::submit('save', 'Spara')."\n";
?>
	</form>
	<?= Form::button('abort','Avbryt', array('onclick' => 'hideEditBox()')); ?>
</div>
