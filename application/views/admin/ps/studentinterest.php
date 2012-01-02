<h1>Studenters intressen av företag</h1>
<table>
	<thead>
		<tr>
			<th style="width: 200px;">Företag</th>
			<th style="width: 200px;">Student</th>
			<th style="width: 200px;">Tid</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($interests as $i){ ?>
		<tr>
			<td><?php echo $i['name']; ?></td>
			<td><?php echo $i['fname'].' '.$i['lname']; ?></td>
			<td><?php echo date('Y m d H:i:s', $i['time']); ?></td>
		</tr>
		<?php }?>
	</tbody>
</table>