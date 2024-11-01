<?php
function newman_housing_enqueue_styles() {
    wp_enqueue_style('newman-base-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('newman-housing-style', get_stylesheet_directory_uri() . '/style.css', array('newman-base-style'));

    wp_enqueue_script('newman-housing-global', get_stylesheet_directory_uri() . '/js/child-global.js', array(), '1.05', true); 
}
add_action('wp_enqueue_scripts', 'newman_housing_enqueue_styles');

/*
 * ACF JSON Settings Child Theme Settings Part 1 of 2
 * This filter directs ACF to save the field group JSON files 
 * in the /acf-json directory within the child theme.
 * It allows each child theme to have its own custom field groups specific to that site.
 */
add_filter('acf/settings/save_json', function ($path) {
    // Change the path to the child theme directory
    return get_stylesheet_directory() . '/acf-json';
}, 20);

/*
 * ACF JSON Settings Child Theme Settings Part 2 of 2
 * This filter is configured to load field groups from 
 * both the parent and child theme directories.
 * It ensures that the child theme can access shared configurations 
 * from the parent theme while maintaining its unique customizations.
 */
add_filter('acf/settings/load_json', function ($paths) {
    // Remove default path
    unset($paths[0]);

    // Add parent theme path for shared field groups
    $paths[] = get_template_directory() . '/acf-json';

    // Add child theme path for unique field groups
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
}, 20);

/**
 * Register Housing-specific Blocks
 */
function newman_housing_load_blocks() {
    register_block_type( get_stylesheet_directory() . '/blocks/home-hero/block.json' );
    register_block_type( get_stylesheet_directory() . '/blocks/home-about/block.json' );
    register_block_type( get_stylesheet_directory() . '/blocks/home-cards/block.json' );
}
add_action( 'init', 'newman_housing_load_blocks' );

/**
 * Load all our blocks and disallow irrelevant core ones at the same time
 */
function newman_housing_allowed_block_types($allowed_blocks, $editor_context) {
    $acf_blocks = [
        'acf/home-hero',
        'acf/home-about',
        'acf/home-cards',
        'acf/cards-stats',
        'acf/columns-content',
        'acf/single-content',
        'acf/single-quote',
        'acf/gallery-images',
        'acf/gallery-videos',
        'acf/slider-endorsements',
        'acf/cards-pages',
        'acf/accordions',
        'acf/cards-custom',
        'acf/cards-people',
        'acf/gallery-logos',
        'acf/cards-stats-alt',
        'acf/banner-content',
        'acf/slider-content',
        'acf/columns-two'
    ];

    return $acf_blocks;
}
add_filter('allowed_block_types_all', 'newman_housing_allowed_block_types', 10, 2);