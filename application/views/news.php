<? foreach(Model::factory('news')->get_news(5) as $news){ ?>
<div class="story">
	<h1><?=$news['title']; ?></h1><p>Publicerad: <?=date('Y m d h:i', $news['published']); ?></p>
	<p><?=$news['text']; ?></p>
	<p>Skriven av: <?=$news['fname'].' '.$news['lname']; ?></p>
</div>
<? } ?>