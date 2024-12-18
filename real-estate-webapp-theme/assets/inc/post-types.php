<?php
function register_series_post_type() {
    $labels = array(
        'name' => 'Series',
        'singular_name' => 'Series',
        'add_new' => 'Add New Series',
        'add_new_item' => 'Add New Series',
        'edit_item' => 'Edit Series',
        'view_item' => 'View Series',
        'search_items' => 'Search Series',
        'not_found' => 'No series found',
        'menu_name' => 'Real Estate Series'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-building',
        'rewrite' => array('slug' => 'series')
    );

    register_post_type('real_estate_series', $args);
}
add_action('init', 'register_series_post_type');
