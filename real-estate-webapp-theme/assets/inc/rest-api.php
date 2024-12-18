<?php
class RealEstate_REST_Controller {
    public function __construct() {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    public function register_routes() {
        register_rest_route('real-estate/v1', '/properties', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_properties'),
            'permission_callback' => array($this, 'check_authorization')
        ));

        register_rest_route('real-estate/v1', '/activities', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_activities'),
            'permission_callback' => array($this, 'check_authorization')
        ));

        register_rest_route('real-estate/v1', '/series', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_series'),
            'permission_callback' => array($this, 'check_authorization')
        ));
    }

    public function check_authorization() {
        return is_user_logged_in();
    }

    public function get_properties() {
        $user_id = get_current_user_id();
        $properties = get_user_properties($user_id);

        return new WP_REST_Response($properties, 200);
    }

    public function get_activities() {
        $user_id = get_current_user_id();
        $activities = get_user_activities($user_id);

        return new WP_REST_Response($activities, 200);
    }

    public function get_series() {
        $user_id = get_current_user_id();
        $series = get_user_series($user_id);

        return new WP_REST_Response($series, 200);
    }
}

new RealEstate_REST_Controller();

// Helper functions
function get_user_properties($user_id) {
    $args = array(
        'post_type' => 'real_estate_series',
        'meta_query' => array(
            array(
                'key' => 'owner_id',
                'value' => $user_id,
                'compare' => '='
            )
        )
    );

    $properties = array();
    $query = new WP_Query($args);

    while ($query->have_posts()) {
        $query->the_post();
        $properties[] = array(
            'id' => get_the_ID(),
            'name' => get_the_title(),
            'lat' => get_post_meta(get_the_ID(), 'property_lat', true),
            'lng' => get_post_meta(get_the_ID(), 'property_lng', true)
        );
    }

    wp_reset_postdata();
    return $properties;
}

function get_user_activities($user_id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'user_activities';
    
    $activities = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE user_id = %d ORDER BY activity_time DESC LIMIT 10",
            $user_id
        )
    );

    return array_map(function($activity) {
        return array(
            'id' => $activity->id,
            'time' => $activity->activity_time,
            'description' => $activity->description,
            'type' => $activity->activity_type
        );
    }, $activities);
}

function get_user_series($user_id) {
    $args = array(
        'post_type' => 'real_estate_series',
        'author' => $user_id
    );

    $series = array();
    $query = new WP_Query($args);

    while ($query->have_posts()) {
        $query->the_post();
        $series[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'description' => get_the_excerpt(),
            'image' => get_the_post_thumbnail_url(),
            'price' => get_post_meta(get_the_ID(), 'series_price', true),
            'ownership' => get_post_meta(get_the_ID(), 'ownership_percentage', true)
        );
    }

    wp_reset_postdata();
    return $series;
}
