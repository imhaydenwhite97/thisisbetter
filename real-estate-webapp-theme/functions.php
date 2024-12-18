<?php
// Theme Setup
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    // Register Navigation Menus
    register_nav_menus(array(
        'desktop-menu' => 'Desktop Dock Menu',
        'primary-menu' => 'Primary Menu',
        'mobile-menu' => 'Mobile Menu',
        'footer-menu' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Enqueue All Styles
function enqueue_theme_styles() {
    wp_enqueue_style('theme-styles', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    wp_enqueue_style('auth-styles', get_template_directory_uri() . '/assets/css/auth.css');
    wp_enqueue_style('content-styles', get_template_directory_uri() . '/assets/css/content.css');
    wp_enqueue_style('login-page-styles', get_template_directory_uri() . '/assets/css/login-page.css');
    wp_enqueue_style('registration-page-styles', get_template_directory_uri() . '/assets/css/registration-page.css');
    wp_enqueue_style('menu-styles', get_template_directory_uri() . '/assets/css/menu.css');
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

// Enqueue All Scripts
function enqueue_theme_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('auth-scripts', get_template_directory_uri() . '/assets/js/auth.js', array('jquery'), '', true);
    wp_enqueue_script('menu-scripts', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '', true);
    wp_enqueue_script('transitions-scripts', get_template_directory_uri() . '/assets/js/transitions.js', array('jquery'), '', true);

    // Add AJAX support
    wp_localize_script('auth-scripts', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('auth_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

// Load Core Files
require_once get_template_directory() . '/inc/authentication.php';
require_once get_template_directory() . '/inc/rest-api.php';
require_once get_template_directory() . '/inc/post-types.php';
