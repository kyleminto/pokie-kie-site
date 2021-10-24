<?php
	/**
	 *	Template Name: News Landing
	 *
	 *	@package understrap
	**/

	defined( 'ABSPATH' ) || exit;
	get_header();
	
	global $post;
?>

<?= get_template_part('global-templates/categories') ?>

<div class="container px-4 pb-5 articles">
	<div class="columns sort">
		<?php
			$ids = [
				'posts_per_page' => 1000,
				'fields' => 'ids'
			];

			$post_ids = get_posts($ids);

			$args = [
				'paged' => $paged,
				'post__in' => $post_ids,
				'posts_per_page' => 6 // TESTING PAGINATION
			];

			$posts = new WP_Query($args);

			while($posts->have_posts()) {
				$posts->the_post();
				get_template_part('loop-templates/content', get_post_format());
			}

			wp_reset_postdata();
		?>
	</div>
</div>

<?php
	$pagination = paginate_links([
		'base' => str_replace(99999999, '%#%', esc_url(get_pagenum_link(99999999))),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $posts->max_num_pages,
		'prev_text'    => __('« prev'),
		'next_text'    => __('next »'),
	]);
?>

<div class="container pagination px-4 py-5">
	<?= $pagination ?>
</div>

<?php get_footer(); ?>