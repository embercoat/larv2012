<?php
echo Form::open('/admin/import/stage4')
	.Form::hidden('filename', $filename)
	.Form::hidden('carryOn', $carryOn);
	
$data = Model::factory('data');
$alternator = 0;
$selected =  array (125 => '7', 126 => '50', 127 => '19', 128 => '20', 129 => '29', 130 => '30', 131 => '39', 132 => '8', 133 => '21', 134 => '22', 135 => '63', 136 => '32', 137 => '65', 138 => '65', 139 => '40', 140 => '24', 141 => '25', 142 => '84', 143 => '9', 144 => '52', 145 => '10', 146 => '42', 147 => '12', 148 => '11', 149 => '67', 150 => '13', 151 => '26', 152 => '34', 153 => '87', 154 => '15', 155 => '35', 156 => '54', 157 => '89', 158 => '90', 159 => '16', 160 => '27', 161 => '17', 162 => '28', 163 => '18', 164 => '6', 165 => '119', 166 => '120', 167 => '122', 168 => '120');
?>
<h1>Program</h1>
<table>
	<thead>
		<tr>
			<td>Argast</td>
			<td>Databasen</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($programs  as $key => $value){ ?>

		<tr <?=(($alternator++ % 2 == 0) ? 'style="background-color: silver;"': ''); ?>>
			<td><?php echo $index[$value]; ?></td>
			<td><?php echo Form::select('program['.$key.']', $data->format_for_select($data->get_program()), $selected[$value]); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php
	echo Form::submit('submit', 'Skicka')
		.Form::close();
?>