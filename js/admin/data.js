function editProgram(id){
	$('#editBox').show();
	document.getElementById('newname').value = $('#program_'+id).html();
	document.getElementById('oldname').value = $('#program_'+id).html();
	document.getElementById('newurl').value = $('#url_'+id).html();
	document.getElementById('oldurl').value = $('#url_'+id).html();
	
	document.getElementById('program_id').value = id; 
}
function addProgram(){
	$('#editBox').show();
	document.getElementById('program_id').value = 'new'; 
}
function hideEditBox(){
	$('#editBox').hide();
}

function editSidemenu(id){
	$('#editBox').show();
	document.getElementById('oldid').value = id;
	if (id) {
		document.getElementById('id').value = id;
		document.getElementById('controller').value = $('#controller_'+id).html();
		document.getElementById('action').value = $('#action_'+id).html();
		document.getElementById('text').value = $('#text_'+id).html();
	}
}
