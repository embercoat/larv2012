<a href="/admin/export/psBooked" style="float: left; clear: right;">Exportera</a><br />
<table id="schedule" style="float: left;">
	<tbody>
		<tr>
		<td></td>
		<?php foreach($periods as $p){ ?>
			<td><?php echo $p['start'].' - '.$p['end'];?></td>
		<?php } ?>
		</tr>
		<?php foreach($foretag as $f){ ?>
		<tr>
			<td><?=$f['name']; ?></td>
			<?php foreach($periods as $p){ ?>
			<td <?php echo (isset($timetable[$p['period_id']][$f['company_id']]) ? 'class="occupied"': ''); ?>><?php
			    if(isset($timetable[$p['period_id']][$f['company_id']])){
			        echo '<p>'.$timetable[$p['period_id']][$f['company_id']]['fname'].' '.$timetable[$p['period_id']][$f['company_id']]['lname'].'</p>';
			        echo '<p>'.$rooms[$timetable[$p['period_id']][$f['company_id']]['room']].'</p>';
			    }
			?></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</tbody>
</table>
