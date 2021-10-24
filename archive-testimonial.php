<?php
	/**
	 *	Template Name: Testimonials
	 *
	 *	@package understrap
	**/

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	get_header();
?>

<div class="wrapper" id="testimonials">
	<div class="container title px-4 pt-5">
    	<h1>Testimonials</h1>
    </div>

    <div class="container px-4 py-5">
        <div class="d-flex flex-wrap testimonials">
            <?php $testimonials = new WP_Query([ 'post_type' => 'testimonial', 'posts_per_page' => -1 ]); ?>

            <?php while($testimonials->have_posts()) {
                $testimonials->the_post();
                get_template_part('loop-templates/content-testimonial', get_post_format());
                wp_reset_postdata();
            } ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
