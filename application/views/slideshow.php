<div class="slides_container">
    <?php foreach(Model::factory('file')->get_files(DOCROOT.'images/slideshow') as $slide){ ?>
    <div>
        <img src="/<?php echo str_replace(DOCROOT, '', $slide); ?>" />
    </div>
    <?php } ?>
</div>

