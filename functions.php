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

// 4. Inherit parent theme.json color settings (palette, gradients, duotone)
add_filter( 'theme_json_data_theme', function( $theme_json ) {
    if ( is_child_theme() ) {
        $parent = wp_get_theme()->parent();
        $parent_json_path = get_theme_root() . '/' . $parent->get_stylesheet() . '/theme.json';

        if ( file_exists( $parent_json_path ) ) {
            $parent_json = json_decode( file_get_contents( $parent_json_path ), true );
            $child_data  = $theme_json->get_data();

            // Inherit Color Palette
            if ( isset( $parent_json['settings']['color']['palette'] ) ) {
                $child_data['settings']['color']['palette'] = $parent_json['settings']['color']['palette'];
            }

            // Inherit Gradients
            if ( isset( $parent_json['settings']['color']['gradients'] ) ) {
                $child_data['settings']['color']['gradients'] = $parent_json['settings']['color']['gradients'];
            }

            // Inherit Duotone
            if ( isset( $parent_json['settings']['color']['duotone'] ) ) {
                $child_data['settings']['color']['duotone'] = $parent_json['settings']['color']['duotone'];
            }

            $theme_json->update( $child_data );
        }
    }

    return $theme_json;
} );