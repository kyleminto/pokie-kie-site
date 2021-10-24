<?php
    /**
    *	Template Name: Home
    *
    *	@package understrap
    **/

	defined( 'ABSPATH' ) || exit;
	get_header();
?>

<div class="container px-4 py-5">
    <h2 class="pb-3">Introduction</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam tristique imperdiet consequat. Vestibulum finibus, enim eu euismod fermentum, nisl neque eleifend tellus, eget rutrum nisl ipsum eu risus. Cras vitae magna et nisl semper sodales. Praesent luctus malesuada sapien commodo venenatis. Quisque sit amet mauris lacus. Proin vel lacus ligula.</p>
    <p>Mauris nibh ante, hendrerit vitae pretium sed, mattis non risus. Fusce ultrices lacus et massa condimentum, vel aliquam dolor pellentesque. Praesent vulputate lorem id ipsum lacinia venenatis. Etiam eleifend vitae ligula ut hendrerit. Integer convallis, arcu sed viverra feugiat, justo arcu ultrices nibh, eu aliquet lacus eros at metus.</p>
    <p>Donec orci dui, facilisis at tellus sed, iaculis consectetur diam. Phasellus at tortor sit amet arcu dictum pellentesque at vel lorem. Praesent porta odio ut arcu placerat rutrum.</p>
</div>

<div class="container px-4 pb-5">
    <h2 class="pb-3">Testimonials</h2>

    <div class="d-flex flex-wrap testimonials">
        <?php $testimonials = new WP_Query([ 'post_type' => 'testimonial', 'posts_per_page' => 3 ]); ?>

        <?php while($testimonials->have_posts()) {
            $testimonials->the_post();
            get_template_part('loop-templates/content-testimonial', get_post_format());
            wp_reset_postdata();
        } ?>
    </div>
</div>

<?php get_footer(); ?>