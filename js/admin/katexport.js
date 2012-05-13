var current_company = 0;

$(document).ready(function() {
    $("#progressbar").progressbar({ value: 0 });
});
function doIt(){
	jQuery.ajaxSetup({async:false});
	$("#progress").show();
	var cdata;
	$.getJSON('/admin/export/getCompanies', function(data, status){
		cdata = data;
	});
	var date = new Date();
	var curDate = null;
	
	$("#companies").html(cdata.length);
	scale = 100 / cdata.length;
	i = 0;
	while(i<cdata.length){
		$('#current').html(i+1);
		//$.getJSON('/admin/export/genCompanyPDF/'+ cdata[i].company_id, function(data, status){
		//	 $("#progressbar").progressbar({ value: (i+1)*scale });
		//});
    i++;
	}

}