<?php
/*
Template Name: Series Listing
*/

get_header();
?>

<div class="series-grid">
    <?php
    $args = array(
        'post_type' => 'real_estate_series',
        'posts_per_page' => -1
    );
    
    $series_query = new WP_Query($args);
    
    if ($series_query->have_posts()) :
        while ($series_query->have_posts()) : $series_query->the_post();
    ?>
        <div class="series-card">
            <div class="series-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="series-content">
                <h2><?php the_title(); ?></h2>
                <div class="series-meta">
                    <?php 
                    $price = get_post_meta(get_the_ID(), 'series_price', true);
                    $location = get_post_meta(get_the_ID(), 'series_location', true);
                    ?>
                    <span class="price"><?php echo esc_html($price); ?></span>
                    <span class="location"><?php echo esc_html($location); ?></span>
                </div>
                <div class="series-description">
                    <?php the_excerpt(); ?>
                </div>
                <button class="co-buy-button" data-series-id="<?php the_ID(); ?>">Co-Buy Now</button>
            </div>
        </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>

<!-- Co-Buy Modal -->
<div id="co-buy-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Co-Buy Property</h2>
        <form id="co-buy-form">
            <input type="hidden" id="series-id" name="series-id">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="investment-amount">Investment Amount</label>
                <input type="number" id="investment-amount" name="investment-amount" required>
            </div>
            <div class="signature-pad">
                <label>Signature</label>
                <canvas id="signature-canvas"></canvas>
            </div>
            <button type="submit">Submit Co-Buy Application</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
