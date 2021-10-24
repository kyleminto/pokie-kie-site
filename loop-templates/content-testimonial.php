<div class="item">
    <img src="<?= image_path() ?>/testimonials/profile_photo_<?= rand(0, 8) ?>.png" alt="<?= get_the_title() ?>'s Testimonial Image" />

    <i class="fas fa-quote-left"></i>
        <?php the_post(); the_content(); ?>
    <i class="fas fa-quote-right"></i>

    <h5><?= get_the_title() ?></h5>
</div>