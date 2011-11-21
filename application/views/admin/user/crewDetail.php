<strong>Sökande:</strong> 	<?php echo $crew['fname'].' '. $crew['lname']; ?><br />
<strong>Epost:</strong> 	<?php echo $crew['email']; ?><br />
<strong>Telefon:</strong> 	<?php echo $crew['phone']; ?><br />
<strong>Datum:</strong> 		<?php echo date('Y-m-d h:i:s', $crew['date']); ?><br />
<strong>Roll:</strong> 		<?php echo $crew['role']; ?><br />
<strong>Program:</strong>	<?php $prog = user::get_program($crew['programId']); echo $prog[$crew['programId']]; ?><br />
<strong>Program Övrigt:</strong> <?php echo $crew['program_ovrig'];?><br />
<strong>År:</strong>		<?php echo $crew['year']; ?><br />
<strong>Motivation:</strong> <?php echo $crew['motivation']; ?><br />
<strong>Erfarenhet:</strong> <?php echo $crew['experience']; ?><br />
<strong>Extrainfo:</strong><br />
<?php
if(is_array(unserialize($crew['extradata']))){
	foreach(unserialize($crew['extradata']) as $key => $data){
		echo $key.': '.$data.'<br />';
	}
} else {
	echo "<em>Tomt</em>";
}
?>
