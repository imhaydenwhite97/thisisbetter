<?php
/*
Template Name: Login Page
*/

if (is_user_logged_in()) {
    wp_redirect(home_url('/dashboard'));
    exit;
}

get_header();
?>

<div class="login-page">
    <div class="login-wrapper">
        <div class="welcome-section">
            <h1><?php echo get_theme_mod('login_heading', 'Welcome Back'); ?></h1>
            <p><?php echo get_theme_mod('login_subheading', 'Access your real estate portfolio and investments.'); ?></p>
        </div>

        <?php get_template_part('template-parts/auth/login-form'); ?>
    </div>

    <div class="login-features">
        <div class="feature">
            <i class="fas fa-lock"></i>
            <h3>Secure Access</h3>
            <p>Your account is protected with enterprise-grade security.</p>
        </div>
        <div class="feature">
            <i class="fas fa-mobile-alt"></i>
            <h3>Mobile Ready</h3>
            <p>Manage your investments on any device, anywhere.</p>
        </div>
        <div class="feature">
            <i class="fas fa-headset"></i>
            <h3>24/7 Support</h3>
            <p>Our team is always here to help you succeed.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
