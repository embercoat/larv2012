<?php
$keys = array_keys($list_heads);
?>
<table>
	<thead>
		<tr>
			<?php foreach($keys as $k){ ?>
			<th style="width: 150px;"><?=$list_heads[$k]; ?></th>
			<? } ?>
		</tr>
	</thead>
	<tbody>
		<? foreach($list as $l){ ?>
		<tr>
			<? foreach($keys as $k) {
			     ?>
				<td><?=$l[$list_heads[$k]]; ?></td>
			<? } ?>
		</tr>
		<? } ?>
	</tbody>

</table>