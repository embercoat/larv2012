<div style="float: left; width: 1200px;">
<h1>Sista Chansen. Det här kommer ta bort ALL företagsdata och skriva in den nya.</h1>
<br />
<h2>Är du säker?</h2>
<br />
<?php
echo Form::open('/admin/import/stage7')
	.Form::hidden('filename', $filename)
	.Form::hidden('carryOn', $carryOn)
	.Form::submit('submit', 'Jag är säker')
	.Form::close();
	extract(unserialize($carryOn));
	$larvPrograms = Model::factory('data')->format_for_select(Model::factory('data')->get_program()); 
?>
<br /><br />
<h1>Det här är som det kommer se ut</h1><br />
<h2>Program</h2>
<table>
	<thead>
		<tr>
			<th>Program Argast</th>
			<th>Program LARV</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($programs as $key => $p){ ?>
		<tr>
			<td><?php echo $index[$p];?></td>
			<td><?php echo $larvPrograms[$programTranslation[$key]]; ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<h2>Fält</h2>
<table>
	<thead>
		<tr>
			<th>Fält Argast</th>
			<th>Fält LARV</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($keys as $key => $k){
		if(!array_search($key, $ignore)){
	 ?>
		<tr>
			<td><?php echo $key;?></td>
			<td><?php echo $k; ?></td>
		</tr>
	<?php }} ?>
	</tbody>
</table>


</div>