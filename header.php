<?php
    /**
     *  Header
     *
     *  @package UnderStrap
    **/

    defined( 'ABSPATH' ) || exit;
?>

<!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
        <?php do_action( 'wp_body_open' ); ?>

        <!-- 
            Looks a little complicated, but it uses the default ID unless it's archive.php or index.php
        -->

        <?php
            $banner = get_field('banners', (is_home()) ? 43 : (!empty(get_query_var('cat')) ? 137 : false));
            $thin_banner = !empty($banner['thin_banner']);
            $show_title = $banner['show_page_title'];
            $custom_title = $banner['custom_title'];
        ?>
    
        <div class="site" id="page">
            <header class="<?= $thin_banner ? 'thin' : '' ?>">
                <div class="container p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="/" class="logo">
                        <span>Pokie Kie's</span> Live Break Shop
                        </a>

                        <div class="hamburger-wrapper">
                            <p>Menu</p>
                            <div class="hamburger">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Handles the banner image/s; enables slick if necessary -->

                <div class="inner">
                    <?php if($banner['type'] == 'images' && !empty($banner['images'])) { ?>
                        <div class="banner <?= (count($banner['images']) > 1) ? 'slick' : 'single' ?>">
                            <?php foreach($banner['images'] as $image) { ?>
                                <div class="image" style="background: url(<?= $image['url'] ?>)"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if($banner['type'] == 'video' && !empty($banner['video'])) { ?>
                        <div class="banner-video">
                            <video playsinline autoplay muted loop>
                                <source src="<?= $banner['video']['url'] ?>" type="video/mp4">
                            </video>
                        </div>
                    <?php } ?>

                    <!-- Ensure there's a banner before attempting to display the title -->

                    <?php if(!empty($show_title) && (!empty($banner['video']) || !empty($banner['images']))) { ?>
                        <div class="title">
                            <div class="container px-4">
                                <h1><?= (strlen($custom_title) > 1) ? $custom_title : (is_category() ? 'News - ' . get_cat_name(get_query_var('cat')) : get_the_title()) ?></h1>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </header>

            <nav>
                <div class="container px-4">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'walker' => new Understrap_WP_Bootstrap_Navwalker()
                        ]);
                    ?>
                </div>
            </nav>
