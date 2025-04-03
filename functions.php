<?php
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'twentytwentyfive-child-custom-style',
        get_stylesheet_directory_uri() . '/style-custom.css',
        [],
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script(
        'twentytwentyfive-child-scroll-header',
        get_stylesheet_directory_uri() . '/scroll-header.js',
        [],
        null,
        true
    );
}, 20 );