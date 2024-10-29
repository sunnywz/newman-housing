<?php
function newman_housing_enqueue_styles() {
    wp_enqueue_style('newman-base-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('newman-housing-style', get_stylesheet_directory_uri() . '/style.css', array('newman-base-style'));
}
add_action('wp_enqueue_scripts', 'newman_housing_enqueue_styles');
