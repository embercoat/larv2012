var current_company = 0;


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
	i = 0;
	while(i<cdata.length){
		$.getJSON('/admin/export/genCompanyPDF/'+ cdata[i].company_id);
//    	do { curDate = new Date(); } 
//    	while(curDate-date < 200);
    i++;
	}

}