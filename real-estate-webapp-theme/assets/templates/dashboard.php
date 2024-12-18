<?php
/*
Template Name: User Dashboard
*/

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
    exit;
}

get_header();
?>

<div class="dashboard-container">
    <div class="dashboard-grid">
        <!-- Profile Overview -->
        <div class="dashboard-card profile-card">
            <?php echo get_avatar(get_current_user_id(), 90); ?>
            <h2><?php echo wp_get_current_user()->display_name; ?></h2>
            <div class="profile-stats">
                <div class="stat">
                    <span class="number"><?php echo count_user_series(); ?></span>
                    <span class="label">Series</span>
                </div>
                <div class="stat">
                    <span class="number">$<?php echo get_total_ownership_value(); ?></span>
                    <span class="label">Portfolio Value</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-card actions-card">
            <h3>Quick Actions</h3>
            <div class="action-buttons">
                <button class="create-series-btn">Create Series</button>
                <button class="view-investments-btn">View Investments</button>
                <button class="manage-profile-btn">Manage Profile</button>
            </div>
        </div>

        <!-- Property Map -->
        <div class="dashboard-card map-card">
            <h3>Your Properties</h3>
            <div id="properties-map"></div>
        </div>

        <!-- Recent Activity -->
        <div class="dashboard-card activity-card">
            <h3>Recent Activity</h3>
            <div class="activity-feed">
                <!-- Activity items will be loaded dynamically -->
            </div>
        </div>

        <!-- Portfolio Overview -->
        <div class="dashboard-card portfolio-card">
            <h3>Portfolio Overview</h3>
            <canvas id="portfolio-chart"></canvas>
        </div>

        <!-- Series Management -->
        <div class="dashboard-card series-card">
            <h3>Your Series</h3>
            <div class="series-list">
                <!-- Series items will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
