<div class="container spacer p<?= get_sub_field('size') == 'single' ? 't' : 'y' ?>-5">
    <?php if(get_sub_field('visible_line') != 'no') { ?>
        <hr style="background-color: <?= get_sub_field('line_colour') ?>; height: 1px; width: 100%;"/>
    <?php } ?>
</div>