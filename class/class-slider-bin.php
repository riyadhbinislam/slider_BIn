<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Slider_Bin {
    private $post_type;
    private $shortcode;

    public function __construct() {
        add_action('init', array($this, 'init'), 1);
    }
    public function init() {
        $this->includes();
        $this->init_hooks();
        $this->init_components();
    }

// Include the other necessary class files for the plugin to work
// Post Type, Post Setting, Shortcode and Metabox Classes are included
    private function includes() {
        $files = [
            'class/class-slider-bin-post-type.php',
            'class/class-slider-bin-post-setting.php',
            'class/class-slider-bin-metabox.php',
            'class/class-slider-bin-shortcode.php',
        ];

        foreach ($files as $file) {
            $path = SLIDER_BIN_PATH . $file;
            if (file_exists($path)) {
                require_once $path;
            } else {
                error_log("Slider Bin: Failed to include $file");
            }
        }
    }

// Initialize the components of the plugin
// Post Type, Post Setting, Shortcode and Metabox Components/ Class Objects
    private function init_components() {
        $this->post_type = slider_bin_init_post_type();
        $this->post_setting = slider_bin_init_post_setting();
        $this->shortcode = new Slider_Bin_Shortcode();
    }

// Initialize Scripts and Styles for the plugin frontend and admin area on hooks
    private function init_hooks() {
        // Initialize scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));

        // AJAX handlers
        add_action('wp_ajax_get_post_data', array($this, 'get_post_data_ajax'));
        add_action('wp_ajax_nopriv_get_post_data', array($this, 'get_post_data_ajax'));
    }

// Enqueue scripts and styles for the plugin frontend
// Slider Styles and slider Main Script
// Slider autoload Time and Speed localizing

    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'slider-bin-style',
            SLIDER_BIN_URL . 'assets/css/slider-bin-style.css',
            array(),
            filemtime(SLIDER_BIN_PATH . 'assets/css/slider-bin-style.css')
        );

        wp_enqueue_script(
            'slider-bin-script',
            SLIDER_BIN_URL . 'assets/js/slider-bin-plugin.js',
            array('jquery'),
            filemtime(SLIDER_BIN_PATH . 'assets/js/slider-bin-plugin.js') ,
            true
        );

        // // Localize script
        $options = get_option('slider_bin_settings');
        wp_localize_script(
            'slider-bin-script',
            'sliderBinSettings',
            array(
                'autoplay_timeout' => isset($options['autoplay_timeout']) ? intval($options['autoplay_timeout']) : 2500,
                'autoplay_speed' => isset($options['autoplay_speed']) ? intval($options['autoplay_speed']) : 500,
                'autoplay_pause_on_hover' => isset($options['autoplay_pause_on_hover']) ? $options['autoplay_pause_on_hover'] : 'false',
            )
        );
    }

// Enqueue scripts and styles for the plugin admin area
// Slider Admin Styles and slider Admin Script
// Slider Media Script and Color Picker Script

    public function enqueue_admin_assets($hook) {
        global $post_type, $current_screen;

        // Get the current screen
        if (!$current_screen) {
            $current_screen = get_current_screen();
        }

        // Check if we're on the slider settings page
        $is_settings_page = ($current_screen && $current_screen->base === 'slider_post_page_slider_bin_settings');


        // Check if we're on a slider post type page or settings page
        if ((!in_array($hook, ['post.php', 'post-new.php', 'edit.php']) || 'slider_post' !== $post_type)
            && !$is_settings_page) {
            return;
        }

        // Check if we're on a slider post type page
        $is_slider_page = ($post_type === 'slider_post' && in_array($hook, ['post.php', 'post-new.php', 'edit.php']));

         // Only load assets on slider pages or settings page
        if (!$is_slider_page && !$is_settings_page) {
            return;
        }

        wp_enqueue_media();
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');

        wp_enqueue_style(
            'slider-bin-admin-style',
            SLIDER_BIN_URL . 'assets/css/slider-bin-admin-style.css',
            array(),
            filemtime(SLIDER_BIN_PATH . 'assets/css/slider-bin-admin-style.css')
        );

        wp_enqueue_script(
            'slider-bin-media-script',
            SLIDER_BIN_URL . 'assets/js/slider-bin-media.js',
            array('jquery'),
            filemtime(SLIDER_BIN_PATH . 'assets/js/slider-bin-media.js'),
            true
        );
        wp_enqueue_script(
            'slider-bin-admin-script',
            SLIDER_BIN_URL . 'assets/js/slider-bin-admin.js',
            array('jquery'),
            filemtime(SLIDER_BIN_PATH . 'assets/js/slider-bin-admin.js'),
            true
        );

        wp_localize_script(
            'slider-bin-media-script',
            'sliderBinMedia',
            array(
                'title' => __('Select Images', 'slider_bin'),
                'button' => __('Use These Images', 'slider_bin'),
                'ajaxurl' => admin_url('admin-ajax.php')
            )
        );

        // Enqueue scripts and styles for previewing the slider in the admin area
        wp_enqueue_style(
            'slider-bin-style',
            SLIDER_BIN_URL . 'assets/css/slider-bin-style.css',
            array(),
            filemtime(SLIDER_BIN_PATH . 'assets/css/slider-bin-style.css')
        );

        wp_enqueue_script(
            'slider-bin-script',
            SLIDER_BIN_URL . 'assets/js/slider-bin-plugin.js',
            array('jquery'),
            filemtime(SLIDER_BIN_PATH . 'assets/js/slider-bin-plugin.js') ,
            true
        );

        // // Localize script
        $options = get_option('slider_bin_settings');
        wp_localize_script(
            'slider-bin-script',
            'sliderBinSettings',
            array(
                'autoplay_timeout' => isset($options['autoplay_timeout']) ? intval($options['autoplay_timeout']) : 2500,
                'autoplay_speed' => isset($options['autoplay_speed']) ? intval($options['autoplay_speed']) : 500,
                'autoplay_pause_on_hover' => isset($options['autoplay_pause_on_hover']) ? $options['autoplay_pause_on_hover'] : 'false',
            )
        );
    }

//Register AJAX Action
//For Post SLider - For Blog Post Data call.

    public function get_post_data_ajax() {
        // Validate the request
        if (!isset($_GET['post_id'])) {
            wp_send_json_error(['message' => 'Invalid post ID']);
        }

        $post_id = intval($_GET['post_id']);
        $post = get_post($post_id);

        if (!$post) {
            wp_send_json_error(['message' => 'Post not found']);
        }

        $post_type = get_post_type($post_id);

        // Allow fetching for 'post' type (blog posts)
        $allowed_post_types = ['post'];
        if (!in_array($post_type, $allowed_post_types, true)) {
            wp_send_json_error(['message' => "Invalid post type: $post_type"]);
        }

        // Fetch post data
        $title = get_the_title($post_id);
        $excerpt = wp_trim_words(get_the_excerpt($post_id), 30, '...');
        $image_url = get_the_post_thumbnail_url($post_id, 'full') ?: '';
        $post_url = get_permalink($post_id);

        // Send post data as a response
        wp_send_json_success([
            'title' => $title,
            'excerpt' => $excerpt,
            'image_url' => $image_url,
            'link' => $post_url,
        ]);

    }


}