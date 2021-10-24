<div class="container">
    <div class="responsive-video">
        <?php if(get_sub_field('source') == 'embed') { ?>
            <iframe src="<?= get_sub_field('url') ?>" frameborder="0" allowfullscreen></iframe>
        <?php } else { ?>
            <video <?= get_sub_field('attributes') ?? '' ?>>
                <source src="<?= get_sub_field('file')['url'] ?>">
            </video>
        <?php } ?>
    </div>
</div>