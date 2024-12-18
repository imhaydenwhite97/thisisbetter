<nav class="mobile-menu">
    <div class="mobile-menu-container">
        <a href="<?php echo home_url(); ?>" class="menu-item">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        <a href="<?php echo home_url('/series'); ?>" class="menu-item">
            <i class="fas fa-search"></i>
            <span>Explore</span>
        </a>
        <a href="<?php echo home_url('/create-series'); ?>" class="menu-item add-button">
            <i class="fas fa-plus-circle"></i>
            <span>Create</span>
        </a>
        <a href="<?php echo home_url('/notifications'); ?>" class="menu-item">
            <i class="fas fa-bell"></i>
            <span>Alerts</span>
        </a>
        <a href="<?php echo home_url('/dashboard'); ?>" class="menu-item">
            <?php if (is_user_logged_in()): ?>
                <?php echo get_avatar(get_current_user_id(), 24); ?>
                <span>Profile</span>
            <?php else: ?>
                <i class="fas fa-user"></i>
                <span>Login</span>
            <?php endif; ?>
        </a>
    </div>
</nav>
