<?php
/*
Template Name: Registration Page
*/

if (is_user_logged_in()) {
    wp_redirect(home_url('/dashboard'));
    exit;
}

get_header();
?>

<div class="registration-page">
    <div class="registration-wrapper">
        <!-- Optional: Add a welcome message or brand section -->
        <div class="welcome-section">
            <h1><?php echo get_theme_mod('registration_heading', 'Join Our Community'); ?></h1>
            <p><?php echo get_theme_mod('registration_subheading', 'Start your real estate investment journey today.'); ?></p>
        </div>

        <?php get_template_part('template-parts/auth/register-form'); ?>
    </div>

    <!-- Optional: Add testimonials or feature highlights -->
    <div class="registration-features">
        <div class="feature">
            <i class="fas fa-shield-alt"></i>
            <h3>Secure Investment</h3>
            <p>Your investments are protected by industry-leading security measures.</p>
        </div>
        <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h3>Track Performance</h3>
            <p>Monitor your portfolio growth with real-time analytics.</p>
        </div>
        <div class="feature">
            <i class="fas fa-users"></i>
            <h3>Community Driven</h3>
            <p>Join thousands of successful real estate investors.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
