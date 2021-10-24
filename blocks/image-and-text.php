<div class="container image-and-text">
    <div class="d-flex <?= get_sub_field('image_location') ?>">
        <div class="image">
            <img src="<?= get_sub_field('image')['url'] ?>" alt="<?= get_sub_field('image')['alt']; ?>" />
        </div>
        
        <div class="text">
            <?= get_sub_field('text') ?>
        </div>
    </div>
</div>