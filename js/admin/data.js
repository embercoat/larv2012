function editProgram(id){
	$('#editBox').show();
	document.getElementById('newname').value = $('#program_'+id).html();
	document.getElementById('shortname').value = $('#programshort_'+id).html();
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
	document.getElementById('oldid').value = ((id != undefined)?id:'');
	document.getElementById('id').value = (id?id:'');
	document.getElementById('controller').value = (id?$('#controller_'+id).html():'');
	document.getElementById('action').value = (id?$('#action_'+id).html():'');
	document.getElementById('text').value = (id?$('#text_'+id).html():'');
}
