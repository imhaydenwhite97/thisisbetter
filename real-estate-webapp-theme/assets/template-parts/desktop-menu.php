<div class="desktop-menu-overlay">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="logo">
            <?php the_custom_logo(); ?>
        </div>
        <div class="user-profile">
            <?php if (is_user_logged_in()): ?>
                <div class="profile-image">
                    <?php echo get_avatar(get_current_user_id(), 40); ?>
                </div>
            <?php else: ?>
                <a href="<?php echo wp_login_url(); ?>" class="login-button">Login</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bottom-bar">
        <div class="social-icons">
            <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
        </div>

        <div class="mac-dock">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'desktop-menu',
                'container_class' => 'dock-menu',
                'menu_class' => 'dock-items'
            ));
            ?>
        </div>

        <div class="copyright">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
        </div>
    </div>
</div>
