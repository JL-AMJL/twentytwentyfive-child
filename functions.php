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

add_filter( 'wp_theme_json_data_theme', function( $theme_json ) {
    // Nur eingreifen, wenn Child-Theme aktiv ist
    if ( get_template() === 'twentytwentyfive' && is_child_theme() ) {
        // Entferne Style Variations des Parent-Themes
        remove_theme_support( 'theme.json' );
    }
    return $theme_json;
}, 20 );