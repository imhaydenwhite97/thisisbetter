<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
    if (is_front_page()) {
        get_template_part('template-parts/splash-screen');
    }
    ?>
    
    <?php get_template_part('template-parts/desktop-menu'); ?>
    <?php get_template_part('template-parts/mobile-menu'); ?>

    <div id="page" class="site">
        <div id="content" class="site-content">
