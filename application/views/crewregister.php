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
	switch(select){
		case 'ftv': {
		    $('#motivation').html('Anmälan till företagsvärd har stängt. Maila massvard@larv.org för att anmäla ditt intresse.\n\nMVH\nLisa Flemström, Mässvärd LARV 2012');
			$('#motivation').attr('disabled','');
			$('#submit').attr('disabled','');
			break;
		} 
		case 'funktionar': {
		    $('#motivation').html('Anmälan för funktionär har stängt för i år. Välkommen nästa år.');
			$('#motivation').attr('disabled','');
			$('#submit').attr('disabled','');
		break;
		}
		default: {
			$('#motivation').html('');
			$('#motivation').removeAttr('disabled');
			$('#submit').removeAttr('disabled','');
		}
	}
}
</script>
<?
if(isset($_SESSION['user']) && $_SESSION['user']->logged_in()){ 
	$roles = array(
		''				=> 'Välj en roll',
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
