<div><?php 

if(!isset($_SESSION['user']) || !$_SESSION['user']->logged_in()) {
    //Inte Inloggad
?>
	<p>För att kunna anmäla intresse för personliga samtal måste du ha en användare. Du kan antingen <a href="/login/redirect/katalog_ps">Logga In</a> eller <a href="/register/">Registrera dig</a>.</p>
<?php
} else {
    //Inloggad
?>
	
	<p>För att ge företagen en så bra bild av dig som möjligt är det viktigt att du har fyllt i din <a href="/user/">Profil</a> ordentligt. Ta gärna en extra titt på den för att vara säker.</p>
	<p>Istället för ett personligt brev till företagen har du här 1000 antal tecken på dig att imponera på dem.</p>
	<?php if(isset($_SESSION['message']['fail'])){?>
		<h3>Följande fel uppstod</h3>
		<ul>
			<?php
			 foreach($_SESSION['message']['fail'] as $fail){?>
			<li style="color:red"><?php echo $fail; ?></li>
			<?php
			}
			unset($_SESSION['message']);
			?>
		</ul>
	<?php } ?>
	<?php
	if(count($companies) > 0){
    	echo Form::open('/katalog/ps/');
    	echo "<ul>";
        foreach($companies as $c) {
    	    echo '<li><span class="counter" style="float: right;"></span>'.Form::label('motivation['.$c['company_id'].']', 'Motivation: '.$c['catalogue_company_name'])
    	    .Form::textarea('motivation['.$c['company_id'].']', (isset($preset) ? $preset['motivation'][$c['company_id']] : '') ,array('class' => 'word_count')).'</li>';
        }
        echo '</ul>';
        echo Form::submit('submit', 'Skicka')
    	    .Form::close();
	} else {
	?>		
	<p><b>Du har ju inte valt några företag att ha samtal med! Gå tillbaka och leta upp dina företag först.</b></p>
<?php
	} 
}

?>
</div>
