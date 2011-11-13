<style type="text/css">
	@import url('/css/form.css');
</style>
<script type="text/javascript">
function showhide(select){
		if(select == 'chauffor'){
			$("#licenses").show();
		} else {
			$("#licenses").hide();
		}
}
</script>

<?php
if(isset($_SESSION['user']) && $_SESSION['user']->logged_in()){ 
	$roles = array(
		'ftv'			=> 'Företagsvärd',
		'chauffor'		=> 'Chaufför',
		'massvard'		=> 'Mässvärd',
		'gods'			=> 'Gods',
		'funktionar'	=> 'Funktionär',
		'inredning'		=> 'Inredning'
	);
	echo Form::open('/student/crewregister/')
			
		.Form::label('role', 'Vad vill du göra?')
		.Form::select('role', $roles, false, (array('onChange' => 'showhide(this.value)')))
		
		.'<span class="preHidden" id="licenses">'
		.Form::label('extradata[korkort_b]', 'Personbil')
		.Form::checkbox('extradata[korkort_b]', 'Ja')
		
		.Form::label('extradata[korkort_c]', 'Tung lastbil')
		.Form::checkbox('extradata[korkort_c]', 'Ja')
		
		.Form::label('extradata[korkort_d]', 'Buss')
		.Form::checkbox('extradata[korkort_d]', 'Ja')
		.'</span>'
		

		.Form::label('motivation', 'Motivering')
		.Form::textarea('motivation')
		
		.Form::submit('submit', 'Anmäl Intresse');
} else {
?>
Du måste vara inloggad för att kunna registrera dig som funktionär. Använd länkarna botten av sidan för att antingen registrera dig eller logga in.
<?php  } ?>
