<div class="press-menu">
	<h1>Personliga Samtal</h1>
	<p>Nedan är de företag som du är intresserad att ha personligt samtal med.</p>
	<ul>
	<?php foreach($companies as $c) {?>
		<li><a href="/katalog/foretag/<?php echo $c['company_id']; ?>"><?php echo $c['catalogue_company_name']; ?></a></li>
	<?php } ?>
	</ul>
<?php
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
		<h2>Följande fel uppstod</h2>
		<ul>
			<?php
			 foreach($_SESSION['message']['fail'] as $fail){?>
			<li><?php echo $fail; ?></li>
			<?php
			}
			unset($_SESSION['message']);
			?>
		</ul>
	<?php } ?>
	<?php
	echo Form::open('/katalog/ps/complete')
	    .Form::label('motivation', 'Motivation: ')
	    .Form::textarea('motivation')
	    .Form::submit('submit', 'Skicka')
	    .Form::close();
	?>		
<?php 
}
?>
</div>