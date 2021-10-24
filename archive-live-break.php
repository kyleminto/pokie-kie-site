<?php
	/**
	 *	Template Name: Live Breaks
	 *
	 *	@package understrap
	**/

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	get_header();
?>

<div class="wrapper" id="live-breaks">
	<div class="container title px-4 pt-5">
    	<h1>Live Breaks</h1>
    </div>

    <div class="container px-4 py-5">
        <div class="d-flex flex-wrap live-breaks">
            <?php $testimonials = new WP_Query([ 'post_type' => 'live-break', 'posts_per_page' => -1 ]); ?>

            <?php while($testimonials->have_posts()) {
                $testimonials->the_post();
                get_template_part('loop-templates/content-live-break', get_post_format());
                wp_reset_postdata();
            } ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
