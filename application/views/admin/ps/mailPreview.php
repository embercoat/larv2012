<table>
<?php foreach($mails as $adress => $m){
     ?>
	<tr>
		<td><?php echo $adress; ?>:</td>
	</tr>
	<tr>
		<td><pre><?php echo $m; ?></pre></td>
	</tr>
	<tr><td>&nbsp;</td></tr>
<?php } ?>
<tr>
	<td><a href="/admin/email/psStudent/send">Bekräfta och Skicka.</a></td>
</tr>
</table>
