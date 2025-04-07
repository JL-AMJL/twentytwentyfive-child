<?php
// 1. Editor-spezifische Styles
add_action( 'enqueue_block_editor_assets', function() {
    wp_enqueue_style(
        'editor-ui-fixes',
        get_stylesheet_directory_uri() . '/css/editor-ui-fixes.css',
        [],
        null
    );
} );

// 2. Editor-Styles für Content-Bereich (klassisch)
add_action( 'after_setup_theme', function() {
    add_editor_style( 'css/editor-style.css' );
} );

// 3. Frontend-Skripte und Styles
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'twentytwentyfive-child-custom-style',
        get_stylesheet_directory_uri() . '/css/style-custom.css',
        [],
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script(
        'twentytwentyfive-child-scroll-header',
        get_stylesheet_directory_uri() . '/scripts/scroll-header.js',
        [],
        null,
        true
    );
}, 20 );