<div style="float: left">
<?php 
echo Form::open('/admin/import/stage2', array('enctype' => "multipart/form-data"))
	.Form::label('file', 'Exporten från arbetsmarknadsdagar')
	.Form::file('file')
	.Form::submit('submit', 'Ladda Upp')
	.Form::close();
?>
</div>