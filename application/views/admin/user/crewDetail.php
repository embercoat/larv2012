Sökande: <?php echo $crew['fname'].' '. $crew['lname']; ?><br />
Epost: <?php echo $crew['email']; ?><br />
Telefon: <?php echo $crew['phone']; ?><br />
Dag: <?php echo date('Y-m-d h:i:s', $crew['date']); ?><br />
Roll: <?php echo $crew['role']; ?><br />
Motivation: <?php echo $crew['motivation']; ?><br />
Extrainfo:<br />
<?php
if(is_array(unserialize($crew['extradata'])))
foreach(unserialize($crew['extradata']) as $key => $data){
	echo $key.': '.$data.'<br />';
}

?>
