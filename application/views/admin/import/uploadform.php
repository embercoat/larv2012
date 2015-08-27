<div style="float: left">
<p>
Innan du börjar bör du ha låst katalogen och tömt följande tabeller i databasen:
<ul style="margin-left:10px;">
 <li>company</li>
 <li>company_branch</li>
 <li>company_city</li>
 <li>company_countries</li>
 <li>company_data</li>
 <li>company_educationType</li>
 <li>company_fields</li>
 <li>company_offer</li>
 <li>company_program</li>
</ul>
</p>
<?php
echo Form::open('/admin/import/stage2', array('enctype' => "multipart/form-data"))
	.Form::label('file', 'Exporten från arbetsmarknadsdagar')
	.Form::file('file')
	.Form::submit('submit', 'Ladda Upp')
	.Form::close();
?>
</div>