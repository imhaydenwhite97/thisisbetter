<?php
function real_estate_customize_register($wp_customize) {
    // Logo Section
    $wp_customize->add_section('logo_section', array(
        'title' => 'Logo Settings',
        'priority' => 30,
    ));
    
    // Container Width
    $wp_customize->add_section('layout_section', array(
        'title' => 'Layout Settings',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('container_width', array(
        'default' => '1200',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('container_width', array(
        'label' => 'Container Width (px)',
        'section' => 'layout_section',
        'type' => 'number',
    ));
    
    // Colors
    $wp_customize->add_setting('button_color', array(
        'default' => '#007bff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_color', array(
        'label' => 'Button Color',
        'section' => 'colors',
    )));
}
add_action('customize_register', 'real_estate_customize_register');
