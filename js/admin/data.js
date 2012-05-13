function editProgram(id){
	document.getElementById('newname').value = $('#program_'+id).html();
	document.getElementById('shortname').value = $('#programshort_'+id).html();
	document.getElementById('oldname').value = $('#program_'+id).html();
	document.getElementById('newurl').value = $('#url_'+id).html();
	document.getElementById('oldurl').value = $('#url_'+id).html();
	
	document.getElementById('program_id').value = id;
	$('#editBox').show();
	document.getElementById('newname').focus();
	
}
function editCity(id){
	$('#editBox').show();
	document.getElementById('newname').value = $('#city_'+id).html();
	document.getElementById('city_id').value = id; 
}
function addCity(){
	$('#editBox').show();
	document.getElementById('city_id').value = 'new'; 
}
function editCountry(id){
	$('#editBox').show();
	document.getElementById('newname').value = $('#country_'+id).html();
	document.getElementById('country_id').value = id; 
}
function editBranch(id){
	$('#editBox').show();
	document.getElementById('newname').value = $('#branch_'+id).html();
	document.getElementById('branch_id').value = id; 
}
function addBranch(){
	$('#editBox').show();
	document.getElementById('branch_id').value = 'new'; 
}
function addCountry(){
	$('#editBox').show();
	document.getElementById('country_id').value = 'new'; 
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
	id?($('#visible_'+id).html() == 'Ja' ? document.getElementById('visible').checked = true : document.getElementById('visible').checked = false):'';
}