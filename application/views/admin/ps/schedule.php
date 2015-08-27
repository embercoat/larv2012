<a href="/admin/export/psBookedbyRoom" style="float: left;">Exportera</a><br />
<table id="schedule" style="float: left;">
	<tbody>
		<tr>
		<td></td>
		<?php foreach($periods as $p){ ?>
			<td><?php echo $p['start'].' - '.$p['end'];?></td>
		<?php } ?>
		</tr>
		<?php foreach($rooms as $r){ ?>
		<tr>
			<td><?=$r['name']; ?></td>
			<?php foreach($periods as $p){ ?>
			<td <?php echo (isset($timetable[$p['period_id']][$r['room_id']]) ? 'class="occupied"': ''); ?>><?php
			    if(isset($timetable[$p['period_id']][$r['room_id']])){
			        echo '<p>'.$timetable[$p['period_id']][$r['room_id']]['fname'].' '.$timetable[$p['period_id']][$r['room_id']]['lname'].'</p>';
			        echo '<p>'.$timetable[$p['period_id']][$r['room_id']]['name'].'</p>';
			    }
			?></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</tbody>
</table>
