<?php

    if(!defined('ABSPATH')) {
        exit;
    }

    function understrap_remove_scripts() {
        wp_dequeue_style('understrap-styles');
        wp_deregister_style('understrap-styles');

        wp_dequeue_script('understrap-scripts');
        wp_deregister_script('understrap-scripts');
    }

    add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

    function theme_enqueue_styles() {
        $the_theme = wp_get_theme();

        wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get('Version'));
        wp_enqueue_script('jquery');
        wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get('Version'), true);
        wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), $the_theme->get('Version'), true );
        
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    function add_child_theme_textdomain() {
        load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
    }

    add_action('after_setup_theme', 'add_child_theme_textdomain');

    if(function_exists('acf_add_options_page')) {
        acf_add_options_page();
    }

    function custom_add_slick() {
        $the_theme = wp_get_theme();
    
        wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false );
        wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, $the_theme->get('Version'), true );
    }

    add_action('wp_enqueue_scripts', 'custom_add_slick');

    function pn_add_analytics() { ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-0000000-1"></script>
        
        <script>
            window.dataLayer = window.dataLayer || [];
            
            function gtag() { dataLayer.push(arguments); }
            
            gtag('js', new Date());
            gtag('config', 'UA-0000000-1');
        </script>
    <?php }

    add_action('wp_head', 'pn_add_analytics');

    // Returns an email or telephone anchor tag depending on the $str variable

    function make_link($str) {
        return '<a href="' . (strpos($str, '@') !== false ? 'mailto' : 'tel') . ':' . str_replace(' ', '', $str) . '">' . $str . '</a>';
    }

    // FontAwesome

    add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

    function tthq_add_custom_fa_css() {
        wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
    }

    // Grabs the absolute image path

    function image_path() {
        return get_site_url() . '/wp-content/themes/pokie-kie/images';
    }