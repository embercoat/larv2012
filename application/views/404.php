Nothing to see here. Please move on.

<?php 
if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin()){ ?>
<br /><br />
<h2>Hey! You're admin! I can tell you stuff!</h2>
Okay, so here's the deal: Some dude created a link here without creating the proper responses.

He either meant to create a dynamic page that gets its text from the database, <a href="/<?=Request::current()->uri(); ?>/edit/">click here to create one</a>, 
or he meant to create a function to do some pretty cool stuff. If the latter is the probable case then you need to create the function <em>action_<?php echo $arg1;?></em> in the controller <?php echo Request::$current->controller(); ?>.

<?php } ?>