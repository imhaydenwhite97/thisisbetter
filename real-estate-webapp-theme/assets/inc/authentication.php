<?php
class RealEstate_Authentication {
    public function __construct() {
        add_action('init', array($this, 'init_auth_endpoints'));
        add_action('wp_ajax_nopriv_custom_login', array($this, 'handle_login'));
        add_action('wp_ajax_nopriv_custom_register', array($this, 'handle_registration'));
        add_action('wp_ajax_custom_logout', array($this, 'handle_logout'));
    }

    public function init_auth_endpoints() {
        add_rewrite_endpoint('login', EP_ROOT);
        add_rewrite_endpoint('register', EP_ROOT);
        flush_rewrite_rules();
    }

    public function handle_login() {
        $credentials = array(
            'user_login' => $_POST['email'],
            'user_password' => $_POST['password'],
            'remember' => isset($_POST['remember'])
        );

        $user = wp_signon($credentials);

        if (!is_wp_error($user)) {
            wp_send_json_success(array(
                'redirect_url' => home_url('/dashboard'),
                'user' => array(
                    'display_name' => $user->display_name,
                    'email' => $user->user_email
                )
            ));
        } else {
            wp_send_json_error(array(
                'message' => 'Invalid credentials'
            ));
        }
    }

    public function handle_registration() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        if (!is_email($email)) {
            wp_send_json_error(array('message' => 'Invalid email address'));
            return;
        }

        $user_data = array(
            'user_login' => $email,
            'user_email' => $email,
            'user_pass' => $password,
            'display_name' => $name,
            'role' => 'subscriber'
        );

        $user_id = wp_insert_user($user_data);

        if (!is_wp_error($user_id)) {
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            
            wp_send_json_success(array(
                'redirect_url' => home_url('/dashboard')
            ));
        } else {
            wp_send_json_error(array(
                'message' => $user_id->get_error_message()
            ));
        }
    }

    public function handle_logout() {
        wp_logout();
        wp_send_json_success(array(
            'redirect_url' => home_url()
        ));
    }
}

new RealEstate_Authentication();
