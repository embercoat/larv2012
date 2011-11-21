<?php 
$keys = array_keys($crew[0]);
?>

<table>
	<thead>
		<tr>
		<?php
			foreach($keys as $key){
				echo '<th style="width: 150px;">'.$key.'</th>';
			} 
		?>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($crew as $c){
				echo '<tr>';
				foreach($keys as $key){
					if($key == 'date')
						$c[$key] = date('Y-m-d h:i:s');
					echo '<td>'.$c[$key].'</td>';
				}
				echo '</tr>';
			} 
		?>
	</tbody>
</table>